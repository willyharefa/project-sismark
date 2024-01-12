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
        // dd(Request('customer_id'));
        return view('pages.partner.customer.personalia.personalia-customer');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerPersonalia $customerPersonalia)
    {
        //
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
        //
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
