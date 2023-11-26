<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Branch;
use App\Models\Backend\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('title')->latest()->get();
        $branches = Branch::all();
        $titles = Title::all();
        return view('pages.user-management.master-user.user', compact('users', 'branches', 'titles'));
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
        // dd($request->all());
        try {
            $request->validate([
                'employee_id' => 'required',
                'name_user' => 'required',
                'gender' => 'required',
                'nickname' => 'required',
                'title_id' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required',
                'branch_id' => 'required'
            ]);

            User::create([
                'name' => $request->name_user,
                'nickname' => $request->nickname,
                'gender' => $request->gender,
                'employee_id' => $request->employee_id,
                'title_id' => $request->title_id,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'branch_id' => $request->branch_id,
            ]);

            return redirect()->back()->with('success', 'Data user berhasil ditambahkan 🚀')
;
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $branches = Branch::all();
        $titles = Title::all();
        return view('pages.user-management.master-user.edit-user', compact('user', 'branches', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if($request->password !== null)
        {
            $user->update([
                'name' => $request->name_user,
                'nickname' => $request->nickname,
                'gender' => $request->gender,
                'employee_id' => $request->employee_id,
                'title_id' => $request->title_id,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'branch_id' => $request->branch_id,
            ]);
            return redirect()->route('user.index')->with('success', 'Data berhasil diupdate 🚀');
        } else {
            $user->update([
                'name' => $request->name_user,
                'nickname' => $request->nickname,
                'gender' => $request->gender,
                'employee_id' => $request->employee_id,
                'title_id' => $request->title_id,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'username' => $request->username,
                'branch_id' => $request->branch_id,
            ]);
            return redirect()->route('user.index')->with('success', 'Data berhasil diupdate 🚀');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
