<?php

namespace App\Http\Controllers\Teacher;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Schedual;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teacher.schedual.create');
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
            'date' => 'required|date',
            'subject1' => 'required',
            'subject2' => 'required',
            'subject3' => 'required',
            'subject4' => 'required',
            'subject5' => 'required',
            'subject6' => 'required',
        ]);

        $validated['grade_id'] = Auth::user()->teacher->grade->id;

        Schedual::create($validated);

        return redirect()->route('teacher.home')->with([
            'message' => [
                'type' => 'success',
                'text' => 'تم إضافة الخطة الأسبوعية بنجاح'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedual  $schedual
     * @return \Illuminate\Http\Response
     */
    public function show(Schedual $schedual)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedual  $schedual
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedual $schedual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedual  $schedual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedual $schedual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedual  $schedual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedual $schedual)
    {
        //
    }
}
