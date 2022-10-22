<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timelines = Activity::take(5)->where('start_date', '>=', now())->orderBy('start_date', 'DESC')->orderBy('end_date', 'DESC')->get();
        $activities = Activity::orderBy('start_date', 'DESC')->orderBy('end_date', 'DESC')->get();
        return view('pages.admin.activity.index', compact('timelines', 'activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'goal' => 'string|required',
            'content' => 'string|required',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
        ]);

        Activity::create($validated);

        return redirect()->route('admin.activity.index')->with([
            'message' => [
                'type' => 'success',
                'text' => 'تم إضافة النشاط بنجاح.',
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activity.index')->with([
            'message' => [
                'type' => 'warning',
                'text' => 'تم حذف النشاط بنجاح'
            ]
        ]);
    }
}
