<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction\SppbItem;
use Illuminate\Http\Request;

class SppbItemController extends Controller
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
        try {
            $request->validate([
                'sppb_id' => 'required',
                'stock_master_id' => 'required',
                'qty' => 'required',
            ]);

            SppbItem::create([
                'sppb_id' => $request->sppb_id,
                'stock_master_id' => $request->stock_master_id,
                'qty' => $request->qty,
                'branch_id' => 1,
            ]);

            return redirect()->back()->with('success', 'Item berhasil ditambahkan 🚀');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SppbItem $sppbItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SppbItem $sppbItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SppbItem $sppbItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SppbItem $sppbItem)
    {
        $sppbItem->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus 🚀');
    }
}
