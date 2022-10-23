<?php

namespace App\Http\Controllers\Student;

use App\Grade;
use App\Homework;
use App\Http\Controllers\Controller;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $homeworks = Homework::with(['student', 'grade'])->where('student_id', Auth::user()->student->id)->withCount('answers')->orderBy('created_at', 'DESC')->paginate(20);

        return view('pages.student.homework.index', compact('homeworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = student::all();
        return view('pages.student.homework.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the form
        $validated = $request->validate([
            'subject' => 'required|string',
            'content' => 'nullable',
            'student_id' => 'sometimes|required',
            'homework_file' => 'required|image',
        ]);


        /* Uploading file of homework and return path to
        be storing in the database */
        $file = $request->file('homework_file')->store('public/homeworks');
        $validated['file'] = $file;


        /* Check if student isn't passed from the form
        and get the ID from login user */
        if (!$request->has('student_id')) {
            $validated['student_id'] = Auth::user()->student->id;
        }

        // Assign grade from selected student
        $student = student::find($validated['student_id']);
        $validated['grade_id'] = $student->grade->id;

        //Store home work in database
        Homework::create($validated);


        return redirect()->route('student.homework.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم إضافة الواجب بنجاح.',
                ]
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        return view('pages.student.homework.show', compact('homework'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        if ($homework->answers->isNotEmpty()) {
            return redirect()->route('student.homework.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف الواجب حيث أنه مرتبط ببيانات أخرى.',
                    ]
                ]
            );
        }

        $homework->delete();

        return redirect()->route('student.homework.index')->with(
            [
                'message' => [
                    'type' => 'warning',
                    'text' => 'تم حذف الواجب بنجاح.',
                ]
            ]
        );
    }

    public function byGrade(Grade $grade)
    {
        /* Homework::with(['student', 'grade'])->where('grade_id', $grade->id)->withCount('answers')->paginate(20) */
        $homeworks = $grade->homeworks()->with(['student'])->withCount('answers')->paginate(20);

        return view('pages.student.homework.index', compact('homeworks', 'grade'));
    }
}
