<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\SalesUser;
use App\Models\Partner\Customer;
use App\Models\Partner\CustomerBranch;
use App\Models\Partner\CustomerPersonalia;
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
        $customers = Customer::with('branch', 'sales_user', 'customer_branch', 'customer_personalia')->latest()->get();
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
            $customer = Customer::create([
                'branch_id' => 1,
                'name_customer' => $request->name_customer,
                'type_business' => $request->type_business,
                'foundation_date' => $request->foundation_date,
                'npwp' => $request->npwp,
                'owner' => $request->owner,
                'total_employee' => $request->total_employee,
                'address_customer' => $request->address_customer,
                'city' => $request->city,
                'country' => $request->country,
                'phone_a' => $request->phone_a,
                'phone_b' => $request->phone_b ?? "-",
                'email_a' => $request->email_a,
                'email_b' => $request->email_b ?? "-",
                'desc_technical' => $request->desc_technical,
                'desc_clasification' => $request->desc_clasification,
                'add_information' => $request->add_information,
                'sales_user_id' => $request->sales_user_id
            ]);

            for ($i=0; $i < count($request->name_pic); $i++) { 
                CustomerPersonalia::create([
                    'customer_id' => $customer->id,
                    'name_pic' => $request->name_pic[$i],
                    'position' => $request->position[$i],
                    'phone_number' => $request->phone_number[$i]
                ]);
            }
            
            for ($indexBranch=0; $indexBranch < count($request->name_branch); $indexBranch++) { 
                CustomerBranch::create([
                    'customer_id' => $customer->id,
                    'name_branch' => $request->name_branch[$indexBranch],
                    'type_branch' => $request->type_branch[$indexBranch],
                    'pic_branch' => $request->pic_branch[$indexBranch],
                    'address_branch' => $request->address_branch[$indexBranch],
                    'desc_branch' => $request->desc_branch[$indexBranch]
                ]);
            }

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

    public function detailCustomer(Customer $customer)
    {
        // dd($customer->flatMap->customer_personalia);

        // $customerData = $customer->flatMap(function ($item) {
        //     return $item->customer_personalia;
        // });

        // dd($customerData);
        
        return view('pages.partner.customer.detail-customer', compact(
            'customer'
        ));
    }
}
