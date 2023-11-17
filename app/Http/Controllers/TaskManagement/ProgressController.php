<?php

namespace App\Http\Controllers\TaskManagement;

use App\Http\Controllers\Controller;
use App\Models\TaskManagement\Progress;
use App\Models\TaskManagement\Activity;
use Exception;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            Progress::create([
                'activity_id'   => $request->activity_id,
                'date_activity' => $request->date_activity,
                'type_progress' => $request->type_activity,
                'detail' => $request->detail,
                'user_id' => 8,
            ]);
    
            Activity::find($request->activity_id)->update([
                'type_action'=> $request->type_activity,
            ]);
    
            return redirect()->back()->with('success','Yeey, Progress baru anda telah berhasil di input ✅');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Progress $pprogress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        //
    }

    public function createProgress(Activity $activity)
    {
        $progress = Progress::where('activity_id', $activity->id)->with('activities')->latest()->get();
        return view('pages.task-management.progress.progress', compact('activity', 'progress'));
    }
}
