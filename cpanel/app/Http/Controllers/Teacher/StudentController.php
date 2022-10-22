<?php

namespace App\Http\Controllers\Teacher;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('user')->where('grade_id', Auth::user()->teacher->grade->id)->paginate(10);
        return view('pages.teacher.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Auth::user()->teacher->grade;
        return view('pages.teacher.student.create', compact('grade'));
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
            'users.name' => 'required|unique:users',
            'users.email' => 'required|unique:users|email:rfc',
            'users.password' => 'required|confirmed|min:6|max:20',
            'students.phone' => 'required',
            'students.born_at' => 'required|date',
        ]);
        $validated['students']['grade_id'] = Auth::user()->teacher->grade->id;

        DB::transaction(function () use ($validated) {
            $user = User::create(array_merge($validated['users'], ['role' => User::STUDENT]));
            $student = (new Student)->fill($validated['students']);
            $user->student()->save($student);
        });

        return redirect()->route('teacher.student.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم أضافة الطالب بنجاح.',
                ]
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('pages.teacher.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('pages.teacher.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'users.name' => [
                'required',
                Rule::unique('users')->ignore($student->user_id),
            ],
            'users.email' => [
                'required',
                Rule::unique('users')->ignore($student->user_id),
                'email:rfc'
            ],
            'students.phone' => 'required',
            'students.born_at' => 'required|date',
        ]);

        $validated['students']['grade_id'] = Auth::user()->teacher->grade->id;

        DB::transaction(function () use ($validated, $student) {
            $student->update($validated['students']);
            $student->user()->update($validated['users']);
        });

        return redirect()->route('teacher.student.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم تعديل الطالب بنجاح.',
                ]
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->answers->isNotEmpty()) {
            return redirect()->route('student.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف الطالب حيث أنه مرتبط ببيانات أخرى.',
                    ]
                ]
            );
        }
        $user = $student->user();
        $student->delete();
        $user->delete();
        return redirect()->route('teacher.student.index')->with(
            [
                'message' => [
                    'type' => 'warning',
                    'text' => 'تم حذف الطالب بنجاح.',
                ]
            ]
        );
    }

    public function byGrade(Grade $grade)
    {
        $students = $grade->students()->paginate(10);
        return view('pages.teacher.student.index', compact('students', 'grade'));
    }
}
