<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction\PoInternalItem;
use Illuminate\Http\Request;

class PoInternalItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        PoInternalItem::create([
            'po_internal_id' => $request->po_internal_id,
            'stock_master_id' => $request->stock_master_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'total_price' => $request->total_price,
        ]);
        return redirect()->back()->with('success', 'Item telah ditambahkan 🚀');
    }

    /**
     * Display the specified resource.
     */
    public function show(PoInternalItem $poInternalItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PoInternalItem $poInternalItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PoInternalItem $poInternalItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PoInternalItem $poInternalItem)
    {
        $poInternalItem->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus 🚀');
    }
}
