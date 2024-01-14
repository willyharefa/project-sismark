<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner\Customer;
use App\Models\Partner\CustomerPersonalia;
use Illuminate\Http\Request;

class CustomerPersonaliaController extends Controller
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
            CustomerPersonalia::create([
                'customer_id' => $request->customer_id,
                'name_pic' => $request->name_pic,
                'position' => $request->position,
                'phone_number' => $request->phone_number
            ]);

            return redirect()->route('personaliaIndex', $request->customer_id)->with('success', 'Data personalia berhasil ditambahkan 🚀');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerPersonalia $customerPersonalia)
    {
        return view('pages.partner.customer.personalia.personalia-customer-edit', compact('customerPersonalia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerPersonalia $customerPersonalia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerPersonalia $customerPersonalia)
    {
        // dd($request->all());
        try {
            $customerPersonalia->update($request->all());
            return redirect()->route('personaliaIndex', $customerPersonalia->customer_id)->with('success', 'Data personalia berhasil di perbaharui');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerPersonalia $customerPersonalia)
    {
        //
    }

    public function personaliaIndex(Customer $customer)
    {
        return view('pages.partner.customer.personalia.personalia-customer', compact('customer'));
    }
}
