<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Homework;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::with(['teacher', 'grade'])->withCount('answers')->paginate(20);
        return view('pages.homework.index', compact('homeworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('pages.homework.create', compact('teachers'));
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
            'teacher_id' => 'sometimes|required',
            'homework_file' => 'required|image',
        ]);


        /* Uploading file of homework and return path to
        be storing in the database */
        $file = $request->file('homework_file')->store('public/homeworks');
        $validated['file'] = $file;


        /* Check if teacher isn't passed from the form
        and get the ID from login user */
        if (!$request->has('teacher_id')) {
            $validated['teacher_id'] = Auth::user()->teacher->id;
        }

        // Assign grade from selected teacher
        $teacher = Teacher::find($validated['teacher_id']);
        $validated['grade_id'] = $teacher->grade->id;

        //Store home work in database
        Homework::create($validated);


        return redirect()->route('homework.index')->with(
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
        return view('pages.homework.show', compact('homework'));
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
            return redirect()->route('homework.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف الواجب حيث أنه مرتبط ببيانات أخرى.',
                    ]
                ]
            );
        }

        $homework->delete();

        return redirect()->route('homework.index')->with(
            [
                'message' => [
                    'type' => 'warning',
                    'text' => 'تم حذف الواجب بنجاح.',
                ]
            ]
        );
    }
}
