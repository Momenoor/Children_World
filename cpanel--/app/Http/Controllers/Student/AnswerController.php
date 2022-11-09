<?php

namespace App\Http\Controllers\Student;

use App\Answer;
use App\Homework;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::with([['student', 'grade', 'student', 'homework']])->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Homework $homework)
    {

        return view('pages.student.answer.create', compact('homework'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Homework $homework)
    {
        $validated = $request->validate([
            'answer' => 'required|image',
        ]);

        $validated['answer'] = $request->file('answer')->store('public/answers');


        $data = [
            'answer' => $validated['answer'],
            'homework_id' => $homework->id,
            'grade_id' => $homework->grade->id,
            'teacher_id' => $homework->teacher->id,
            'student_id' => auth()->user()->student->id,
        ];

        Answer::create($data);

        return redirect()->route('student.homework.index')->with([
            'message' => [
                'type' => 'success',
                'text' => 'تم حل الواجب بنجاح'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
