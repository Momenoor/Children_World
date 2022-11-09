<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Schedual;
use Illuminate\Http\Request;

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
        $grades = Grade::all();
        return view('pages.admin.schedual.create', compact('grades'));
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
            'grade_id' => 'required',
            'subject1' => 'required',
            'subject2' => 'required',
            'subject3' => 'required',
            'subject4' => 'required',
            'subject5' => 'required',
            'subject6' => 'required',
        ]);

        Schedual::create($validated);

        return redirect()->route('admin.home')->with([
            'message'=>[
                'type'=>'success',
                'text'=> 'تم إضافة الخطة الأسبوعية بنجاح'
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
        //
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
