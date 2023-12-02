<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Inventory\StockMaster;
use App\Models\Partner\Customer;
use App\Models\Transaction\Sppb;
use App\Models\Transaction\SppbItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SppbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sppbs = Sppb::with('branch', 'customer')->latest()->get();
        $customers = Customer::latest()->get();
        return view('pages.transaction.sppb.sppb', compact('sppbs', 'customers'));
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
            $latestData = Sppb::latest()->first();

            // SPPB/PKU/23/01/001        
            if ( $latestData == null ) {
                $generateNo = "001";
            } else {
                $generateNo = substr( $latestData->code_sppb, 15, 3 ) + 1;
                $generateNo = str_pad( $generateNo, 3, "0", STR_PAD_LEFT );
            }

            $sppbNo = "SPPB/PKU/" . date('y') . "/" . date('m') . "/" . $generateNo;

            $newData = Sppb::create([
                'code_sppb' => $sppbNo,
                'no_po_cust' => $request->no_po_cust,
                'customer_id' => $request->customer_id,
                'created_by' => 'Gustia',
                'branch_id' => 1,
            ]);
            return redirect()->route('sppbDetail', $newData)->with('success', 'Data SPPB berhasil dibuat 🚀');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sppb $sppb)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sppb $sppb)
    {
        $customers = Customer::latest()->get();
        return view('pages.transaction.sppb.sppb-edit', compact('sppb', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sppb $sppb)
    {
        $sppb->update([
            'no_po_cust' => $request->no_po_cust,
        ]);
        return redirect()->route('sppb.index')->with('success', 'Data SPPB berhasil diperbaharui 🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sppb $sppb)
    {
        //
    }

    public function sppbDetail(Sppb $sppb)
    {
        try {
            $stock_masters = StockMaster::latest()->get();
            $sppb_items = SppbItem::where('sppb_id', $sppb->id)->with('stock_master', 'sppb')->latest()->get();
            // dd($sppb_items);
            return view('pages.transaction.sppb.sppb-item', compact('sppb', 'stock_masters', 'sppb_items'));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => '403',
                'message' => 'Tidak dapat memproses permintaan',
            ], Response::HTTP_FORBIDDEN);
        }
    }

    public function sppbDetailSubmit(Sppb $sppb)
    {
        $sppb->update([
            'status_sppb' => 'request',
        ]);

        return redirect()->route('sppb.index')->with('success', 'Submit Item SPPB berhasil 🚀');
    }

}
