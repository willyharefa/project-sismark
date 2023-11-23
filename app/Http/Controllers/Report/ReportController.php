<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Inventory\StockMaster;
use App\Models\Sales\Pricelist;
use App\Models\Transaction\PoInternal;
use App\Models\Transaction\Quotation;
use App\Models\Transaction\QuotationItem;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $pdf = Pdf::loadView('report.print-po-internal', ['pointernal' => $poInternal])->setOption(['dpi' => 150, 'defaultFont' => 'arial, sans-serif'])->setPaper('a4', 'portrait');
    
        return $pdf->stream('document.pdf');
        
    }
}
