<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Inventory\StockMaster;
use App\Models\Sales\Pricelist;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceToSppb;
use App\Models\Transaction\PoInternal;
use App\Models\Transaction\PoInternalItem;
use App\Models\Transaction\Quotation;
use App\Models\Transaction\QuotationItem;
use App\Models\Transaction\Sppb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;

class ReportController extends Controller
{
    public function allPricelist()
    {
        $pricelists = Pricelist::with('stock_master', 'city')->latest()->get();
        $data = [
            'title' => 'Welcome to Laravel PDF',
            'content' => 'This is a sample PDF generated using dompdf and Laravel.'
        ];
    
        $pdf = Pdf::loadView('report.all-pricelist', ['pricelist' => $pricelists])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'landscape');
    
        return $pdf->stream('document.pdf');
    }

    public function allProducts()
    {
        $products = StockMaster::with('branch')->get()->groupBy('stock_category');
        $pdf = Pdf::loadView('report.all-product', ['products' => $products])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
    
        return $pdf->stream('document.pdf');
    }

    public function quotationPrint(Quotation $quotation)
    {
    //     $quotations = Quotation::with('activities', 'quotation_items')->get();
        // dd($quotation);
        $quotationItems = QuotationItem::where('quotation_id', $quotation->id)->with('quotation', 'pricelist')->get();
        $pdf = Pdf::loadView('report.print-quotation', ['quotation' => $quotation, 'quotationItems' => $quotationItems])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
    
        return $pdf->stream('document.pdf');
    }

    public function printPoInternal($id)
    {
        $poInternal = PoInternal::find($id)->with('po_internal_item')->latest()->first();
        $poInternalItem = PoInternalItem::where('po_internal_id', $id)->with('po_internal', 'stock_master')->latest()->get();
        $sumSubTotal = $poInternalItem->sum('total_price');
        $ppn = $sumSubTotal * 0.11;
        $grandTotal = $ppn + $sumSubTotal;
        $pdf = Pdf::loadView('report.print-po-internal', [
            'pointernal' => $poInternal,
            'poInternalItem' => $poInternalItem,
            'sumSubTotal' => $sumSubTotal,
            'ppn' => $ppn,
            'grandTotal' => $grandTotal,
            ]
        
            )->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
    
        return $pdf->stream('document.pdf');
        
    }

    public function sppbPrint(Sppb $sppb)
    {
        $pdf = Pdf::loadView('report.print-sppb', ['sppb' => $sppb])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
        return $pdf->stream('document.pdf');
    }

    public function invoicePrint(Invoice $invoice)
    {
        $invoiceToSppbData = InvoiceToSppb::where('invoice_id', $invoice->id)->with('sppb', 'branch')->latest()->get();
        $subTotalTotalPrice = 0;
        foreach ($invoiceToSppbData as $key => $invoiceToSppb) {
            foreach ($invoiceToSppb->sppb->flatMap->sppb_item as $data) {
                $subTotalTotalPrice += $data->total_price;
            }
        }

        $ppn = $subTotalTotalPrice * 0.11;
        $grandTotal = $ppn + $subTotalTotalPrice;
        

        $pdf = Pdf::loadView('report.print-invoice', ['invoice' => $invoice, 'invoiceToSppbData' => $invoiceToSppbData, 'subTotalTotalPrice' => $subTotalTotalPrice, 'grandTotal' => $grandTotal])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
        return $pdf->stream('document.pdf');
    }
}
