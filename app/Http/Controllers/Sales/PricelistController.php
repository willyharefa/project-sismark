<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Backend\City;
use App\Models\Inventory\StockMaster;
use App\Models\Sales\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $products = StockMaster::all();
        $pricelists = Pricelist::latest()->with('stock_master', 'city')->get();
        return view('pages.sales.pricelist.pricelist',
            compact('cities','products', 'pricelists')
        );
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
        
        $validatorData = Validator::make( $request->all(), [
            'stock_master_id' => [
                'required',
                Rule::unique('pricelists', 'stock_master_id')->where(fn ($query) => $query->where( [ 'city_id' => $request->city_i] ))],
            'vendor_id' => ['required'],
            'type_expedition' => ['required'],
            'pay_a' => ['required'],
            'pay_b' => ['required'],
            'pay_c' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
        ],
        [
            'stock_master_id.unique' => 'Pricelist dengan nama produk / kota yang dipilih telah ada',
        ] );

        if ($validatorData->fails()) {
            return redirect()->back()->withErrors($validatorData)->withInput();
        }

        Pricelist::create($request->all());

        return redirect()->back()->with('success','Data baru telah berhasil ditambahkan 🚀');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pricelist $pricelist)
    {
        $cities = City::all();
        $products = StockMaster::all();
        return view('pages.sales.pricelist.edit-pricelist', compact('pricelist', 'cities', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pricelist $pricelist)
    {
        $pricelist->update($request->all());
        return redirect()->route('pricelist.index')->with('success', 'Data pricelist telah berhasil diperbaharui 🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricelist $pricelist)
    {
        $pricelist->delete();
        return redirect()->back()->with('success','Data pricelist telah berhasil dihapus 🚀');
    }
}
