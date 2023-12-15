<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Partner\Customer;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceToSppb;
use App\Models\Transaction\Sppb;
use App\Models\Transaction\SppbItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        $invoices = Invoice::with('customer')->latest()->get();
        return view('pages.transaction.invoice.invoice', compact('customers', 'invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latestInvoice = Invoice::latest()->first();
        $request->validate([
            'customer_id' => 'required',
            'no_po_cust' => 'required',
            'date_top' => 'required',
            'sales_user_id' => 'required',
            'address_delivery' => 'required',
        ]);

        if($latestInvoice == null) {
            $generateNo = "001";
        } else {

            $generateNo = substr($latestInvoice->code_inv, 14, 3) + 1;
            $generateNo = str_pad($generateNo, 3, "0", STR_PAD_LEFT);
        }

        $invoiceNo = "INV/PKU/" . date('y') . '/'. date('m') . '/' . $generateNo;
        
        Invoice::create([
            'code_inv' => $invoiceNo,
            'customer_id' => $request->customer_id,
            'branch_id' => 1,
            'date_top' => $request->date_top,
            'no_po_cust' => $request->no_po_cust,
            'created_by' => 'Gea',
            'sales_user_id' => $request->sales_user_id,
            'address_delivery' => $request->address_delivery,
        ]);

        return redirect()->back()->with('success', 'Invoice baru berhasil dibuat 🚀');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $sppbData = Sppb::where('customer_id', $invoice->customer_id)
                    ->where('used', false)
                    ->with('customer', 'sppb_item')->latest()->get();

        //Mengambil data dari table InvoiceToSppb -> sppb dengan referensi customer id dan used true
        $sppbUsed = InvoiceToSppb::where('invoice_id', $invoice->id)
                                    ->whereHas('sppb', function (Builder $query) use ($invoice) {
                                            $query->where('customer_id', $invoice->customer_id)
                                                  ->where('used', true);
                                                //   ->with('sppb_item');
                                            })
                                    ->with('invoice', 'sppb')->latest()->get();
                                
        $invoiceToSppbData = InvoiceToSppb::where('invoice_id', $invoice->id)->with('sppb', 'branch')->latest()->get();

        // dd($sppbUsed->sppb);
        
        return view('pages.transaction.invoice.invoice-item', compact('invoice', 'sppbData', 'sppbUsed', 'invoiceToSppbData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {

        $sppbUsed = Sppb::where('customer_id', $invoice->customer_id)
                    ->where('used', true)
                    ->with('customer', 'sppb_item')->latest()->get();

                    // dd($sppbUsed);
        // Untuk menjumlahkan total price sppb item dengan mencari data berdasarkan invoiceToSppb
        $invoiceToSppb = InvoiceToSppb::where('invoice_id', $invoice->id)
                        ->whereHas('sppb', function (Builder $query) use ($invoice) {
                            $query->where('customer_id', $invoice->customer_id)
                            ->with('sppb_item');
                        })->with('sppb')->get();

        $sumPrice = $invoiceToSppb->flatMap->sppb->flatMap->sppb_item->sum('total_price');

        $invoice->update([
            'total_inv' => $sumPrice,
            'status_inv' => 'request',
        ]);

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil disubmit 🚀');

        // dd($sumPrice);

        // foreach ($variable as $key => $value) {
        //     # code...
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
