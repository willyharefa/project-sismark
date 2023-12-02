<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction\Invoice;
use App\Models\Transaction\InvoiceToSppb;
use App\Models\Transaction\Sppb;
use App\Models\Transaction\SppbItem;
use Illuminate\Http\Request;

class InvoiceToSppbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            InvoiceToSppb::create([
                'invoice_id' => $request->invoice_id,
                'sppb_id' => $request->sppb_id,
                'branch_id' => 1,
            ]);

            Sppb::find($request->sppb_id)->update([
                'used' => true,
            ]);

            return redirect()->back()->with('success', 'SPPB item berhasil ditambahkan 🚀');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceToSppb $invoiceToSppb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceToSppb $invoiceToSppb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoiceToSppb $invoiceToSppb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceToSppb $invoiceToSppb)
    {
        try {

            $invoiceToSppb->delete();
            Sppb::find($invoiceToSppb->sppb_id)->update([
                'used' => false,
            ]);

            return redirect()->back()->with('success', 'SPPB Item berhasil dihapus 🚀');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editSppbItemPrice(SppbItem $sppbItem, Invoice $invoice)
    {
        return view('pages.transaction.invoice.invoice-item-price', compact('sppbItem', 'invoice'));
    }

    public function updateSppbItemPrice(Request $request, SppbItem $sppbItem)
    {
        try {
            $sppbItem->update([
                'price' => $request->price,
                'total_price' => $request->total_price
            ]);
    
            return redirect()->route('invoice.show', $request->invoice_id)->with('success', 'Harga item berhasil diupdate 🚀');

        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
