<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserManagement\SalesUser;
use Illuminate\Http\Request;

class SalesUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesUsers = SalesUser::with('user')->get();
        $users = User::latest()->get();
        return view('pages.user-management.sales.sales-user', compact('salesUsers', 'users'));
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
    public function show(SalesUser $salesUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesUser $salesUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesUser $salesUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesUser $salesUser)
    {
        //
    }
}
