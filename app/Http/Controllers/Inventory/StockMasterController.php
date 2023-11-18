<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Backend\Branch;
use App\Models\Inventory\StockMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StockMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockMaster = StockMaster::with('branch')->latest()->get();
        $branches = Branch::all();
        return view("pages.inventory.stock.stock", compact("stockMaster","branches"));
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
            $validatorData = Validator::make($request->all(), [
                'code_stock' => [
                    'required',
                    Rule::unique('stock_masters', 'code_stock')->where(fn ($query) => $query->where(['branch_id' => $request->branch_id]) )
                ],
                'name_stock' => ['required'],
                'unit' => ['required'],
                'packaging' => ['required'],
                'stock_category' => ['required'],
            ],
            [
                'code_stock.unique' => 'Kode produk telah terdaftar',
            ] );
            if ($validatorData->fails()) {
                return redirect()->back()->withErrors($validatorData)->withInput();
            }
            StockMaster::create([
                'code_stock'     => $request->code_stock,
                'name_stock'     => $request->name_stock,
                'unit'           => $request->unit,
                'packaging'      => $request->packaging,
                'stock_category' => $request->stock_category,
                'branch_id'      => $request->branch_id,
            ]);
            return redirect()->back()->with('success','Produk baru berhasil ditambahkan 🚀');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StockMaster $stockMaster)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockMaster $stockMaster)
    {
        $branches = Branch::all();
        return view('pages.inventory.stock.edit-stock', compact('branches', 'stockMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMaster $stockMaster)
    {

        $validatorData = Validator::make($request->all(), [
            'code_stock' => ['required',
                Rule::unique('stock_masters', 'code_stock')->ignore($stockMaster->id)->where(fn ($query) => $query->where(['branch_id' => $request->branch_id] ))
            ],
            'name_stock' => ['required'],
            'unit' => ['required'],
            'packaging' => ['required'],
            'stock_category' => ['required'],
        ],[
            'code_stock.unique' => '💥Oops, data stock telah terdaftar. Pastikan kode produk unik.'
        ]);

        if ($validatorData->fails()) {
            return redirect()->back()->withErrors($validatorData)->withInput();
        }
        $stockMaster->update($request->all());
        return redirect()->route('stock-master.index')->with('success','Data berhasil diperbaharui 🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMaster $stockMaster)
    {
        $stockMaster->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
