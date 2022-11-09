<?php

namespace App\Http\Controllers\Teacher;

use App\Grade;
use App\Homework;
use App\Http\Controllers\Controller;
use App\Teacher;
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

        $homeworks = Homework::with(['teacher', 'grade'])->where('teacher_id', Auth::user()->teacher->id)->withCount('answers')->orderBy('created_at', 'DESC')->paginate(20);

        return view('pages.teacher.homework.index', compact('homeworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('pages.teacher.homework.create', compact('teachers'));
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


        return redirect()->route('teacher.homework.index')->with(
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
        return view('pages.teacher.homework.show', compact('homework'));
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
            return redirect()->route('teacher.homework.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف الواجب حيث أنه مرتبط ببيانات أخرى.',
                    ]
                ]
            );
        }

        $homework->delete();

        return redirect()->route('teacher.homework.index')->with(
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
        /* Homework::with(['teacher', 'grade'])->where('grade_id', $grade->id)->withCount('answers')->paginate(20) */
        $homeworks = $grade->homeworks()->with(['teacher'])->withCount('answers')->paginate(20);

        return view('pages.teacher.homework.index', compact('homeworks', 'grade'));
    }
}
