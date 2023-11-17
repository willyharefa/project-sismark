<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Inventory\StockMaster;
use App\Models\Sales\Pricelist;
use App\Models\TaskManagement\Activity;
use App\Models\Transaction\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::with('user', 'branch', 'activities')->get();
        $activities = Activity::with('progress')->where('status_work', 'on-going')->get();
        return view('pages.transaction.quotation.quotation', compact('activities', 'quotations'));
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
        $quotation = Quotation::latest()->first();

        if ( $quotation == null ) {
            $generateNo = "001";
        } else {
            $generateNo = substr($quotation->code_quo, 11, 3) + 1;
            $generateNo = str_pad($generateNo, 3, "0", STR_PAD_LEFT);
        }
        $quotationNo = "QUOPKU" . date('Y') . '-'. $generateNo;
        
        $newData = Quotation::create([
            'code_quo' => $quotationNo,
            'activity_id' => $request->activity_id,
            'no_sp' => $request->no_sp,
            'type_expedition' => $request->type_expedition,
            'type_payment' => $request->type_payment,
            'status_quo' => 'draf',
            'remark' => $request->remark,
            'user_id' => 6,
            'branch_id' => 1,
        ]);

        return redirect()->route('quotation.show', $newData->id)->with('success','Data quotation berhasil diinput, tambahkan produk selanjutnya 🚀');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation)
    {
        // dd($quotation);

        $pricelists = Pricelist::where('type_expedition', $quotation->type_expedition)->with('stock_master', 'city')->get();
        return view('pages.transaction.quotation.item-quotation', compact('quotation', 'pricelists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        //
    }

    public function quotationForm(Activity $activity)
    {
        return view('pages.transaction.quotation.add-quotation', compact('activity'));
    }

    public function getProduct($id)
    {
        $data = Pricelist::where('stock_master_id', $id)->get();
        return response()->json($data);
    }

    public function storeItemQuo(Request $request, Pricelist  $pricelist)
    {
        dd($pricelist);
    }
}

