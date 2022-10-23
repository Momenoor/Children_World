<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Rate;
use App\Student;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::where('teacher_id', auth()->user()->teacher->id)
            ->with('teacher', 'grade', 'student')
            ->groupBy('date')
            ->get();

        return view('pages.teacher.rate.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        abort_if(!(auth()->user()->teacher()->exists() or (!is_null(auth()->user()->teacher) and auth()->user()->teacher->grade()->exists())), 403);

        $students = Student::where('grade_id', auth()->user()->teacher->grade->id)->with('user')->get();

        return view('pages.teacher.rate.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'date'      => 'required|date',
                'rate.*'    => 'required',
            ]
        );

        foreach ($validated['rate'] as $key => $value) {
            $rates[] = [
                'date' => $validated['date'],
                'teacher_id' => auth()->user()->teacher->id,
                'student_id' => $key,
                'grade_id' => auth()->user()->teacher->grade->id,
                'rate' => $value,
            ];
        }

        auth()->user()->teacher->rates()->createMany($rates);

        return redirect()->route('teacher.rate.index')->with([
            'message' => [
                'type' => 'success',
                'text' => 'تم إضافة التقييم بنجاح.'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        abort_if(auth()->user()->teacher->id != $rate->teacher_id, 403);

        $rates = Rate::where([
            'date' => $rate->date,
            'teacher_id' => $rate->teacher_id,
            'grade_id' => $rate->grade_id,
        ])->get();

        return view('pages.teacher.rate.show', compact('rates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
