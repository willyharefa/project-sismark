<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Account\SalesUser;
use App\Models\Partner\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = SalesUser::whereHas(
            'user', fn($query) => $query->where('branch_id', 1)
        )->get();
        $customers = Customer::with('branch', 'sales_user')->get();
        return view('pages.partner.customer.customer', compact('sales', 'customers'));
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
            Customer::create([
                'branch_id' => 1,
                'name' => $request->name_customer,
                'type_business' => $request->type_business,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'email' => $request->email,
                'pic' => $request->name_pic_customer,
                'pic_title' => $request->pic_title,
                'pic_phone' => $request->pic_phone,
                'phone_business' => $request->phone_business,
                'npwp' => $request->npwp,
                'ppn' => $request->ppn,
                'type_currency' => $request->type_currency,
                'bod' => $request->bod,
                'sales_user_id' => $request->pic_user_id
            ]);

            return redirect()->back()->with('success', 'Data customer berhasil ditambahkan 🚀');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $sales = SalesUser::whereHas(
            'user', fn($query) => $query->where('branch_id', 1)
        )->get();
        return view('pages.partner.customer.edit-customer', compact('customer', 'sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update([
                'name' => $request->name_customer,
                'type_business' => $request->type_business,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'email' => $request->email,
                'pic' => $request->name_pic_customer,
                'pic_title' => $request->pic_title,
                'pic_phone' => $request->pic_phone,
                'phone_business' => $request->phone_business,
                'npwp' => $request->npwp,
                'ppn' => $request->ppn,
                'type_currency' => $request->type_currency,
                'bod' => $request->bod,
                'sales_user_id' => $request->sales_user_id,
            ]);
            return redirect()->route('customer.index')->with('success', 'Data customer berhasil diperbaharui 🚀');
        } catch (\Exception $m) {
            return redirect()->back()->with('error', $m->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
