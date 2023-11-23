<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Inventory\StockMaster;
use App\Models\Sales\Pricelist;
use App\Models\Transaction\PoInternal;
use App\Models\Transaction\PoInternalItem;
use Illuminate\Http\Request;

class PoInternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poInternals = PoInternal::latest()->get();
        return view('pages.transaction.po-internal.po-internal', compact('poInternals'));
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
        // POI/PKU/23/11/001
        $poIn = PoInternal::latest()->first();

        if ($poIn == null) {
            $generateNo = "001";
        } else {
            $generateNo = substr($poIn->code_po_in, 16, 3) + 1;
            $generateNo = str_pad($generateNo, 3, "0", STR_PAD_LEFT);
        }
        $poInNo = "POI/PKU/" . date('Y') . "/" . date('m') . "/" . $generateNo;

        $newData = PoInternal::create([
            'code_po_in' => $poInNo,
            'customer_id' => $request->customer_id,
        ]);

        return redirect()->route('po-internal.show', $newData->id)->with('success', 'Data berhasil di buat');


    }

    /**
     * Display the specified resource.
     */
    public function show(PoInternal $poInternal)
    {
        $products = StockMaster::latest()->get();
        $pricelists = Pricelist::with('stock_master', 'city')->latest()->get();
        $poInternalItem = PoInternalItem::where('po_internal_id', $poInternal->id)->with('po_internal', 'stock_master')->latest()->get();
        // dd($poInternalItem);
        return view('pages.transaction.po-internal.po-internal-item', compact('poInternal', 'products', 'pricelists', 'poInternalItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PoInternal $poInternal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PoInternal $poInternal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PoInternal $poInternal)
    {
        //
    }

    public function poInternalSubmit($id)
    {
        $poInternal = PoInternal::where('id', $id)->first();   
        $poInternal->update([
            'status_po_in' => 'request'
        ]);

        return redirect()->route('po-internal.index')->with('success', 'PO Internal berhasil disubmit 🚀🚀');
    }

}
