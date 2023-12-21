<?php

namespace App\Http\Controllers\TaskManagement;

use App\Http\Controllers\Controller;
use App\Models\TaskManagement\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('progress')->latest()->get();
        return view("pages.task-management.activity.activity", compact("activities"));
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
        $getLatestActivity = Activity::latest()->first();
        $getDateCurrent = date('y');
        $baseNo = "ACT";

        if($getLatestActivity == null) {
            $generateNo = "0001";
        } else {
            $generateNo = substr($getLatestActivity->code_activity, 5, 4) + 1;
            $generateNo = str_pad($generateNo, 4,"0", STR_PAD_LEFT);
        }

        $codeActivity = $baseNo . $getDateCurrent . $generateNo;

        $newData = Activity::create([
            'code_activity'     => $codeActivity,
            'name_customer'     => $request->name_customer,
            'type_bussiness'    => $request->type_bussiness,
            'name_pic_customer' => $request->name_pic_customer,
            'position_pic'      => $request->position_pic,
            'location'          => $request->location,
            'type_customer'     => $request->type_customer,
            'user_id'           => 5,
            'branch_id'         => 1,
        ]);

        return redirect()->route('createProgress', $newData->id)->with("success","Data aktivitas baru anda berhasil diinput ✅");

    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view("pages.task-management.activity.edit-activity", compact("activity"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return redirect()->route("activities.index")->with("success","Data aktivitas anda telah berhasil diperbaharui 🚀");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
