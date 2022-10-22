<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);

        return view('pages.admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('pages.admin.teacher.create', compact('grades'));
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
            'teachers.phone' => 'required',
            'teachers.specialization' => 'required|string',
            'teachers.grade_id' => 'required',
        ]);
        DB::transaction(function () use ($validated) {
            $user = User::create(array_merge($validated['users'], ['role' => User::TEACHER]));
            $teacher = (new Teacher())->fill($validated['teachers']);
            $user->teacher()->save($teacher);
        });

        return redirect()->route('admin.teacher.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم أضافة المعلمة بنجاح.',
                ]
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('pages.admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $grades = Grade::all();
        return view('pages.admin.teacher.edit', compact('grades', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'users.name' => [
                'required',
                Rule::unique('users')->ignore($teacher->user_id),
            ],
            'users.email' => [
                'required',
                Rule::unique('users')->ignore($teacher->user_id),
                'email:rfc'
            ],
            'teachers.phone' => 'required',
            'teachers.specialization' => 'required|string',
            'teachers.grade_id' => 'required',
        ]);

        DB::transaction(function () use ($validated, $teacher) {
            $teacher->update($validated['teachers']);
            $teacher->user()->update($validated['users']);
        });

        return redirect()->route('admin.teacher.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم تعديل المعلمة بنجاح.',
                ]
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->homeworks->isNotEmpty()) {
            return redirect()->route('admin.teacher.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف المعلمة حيث أنها مرتبطة ببيانات أخرى.',
                    ]
                ]
            );
        }
        $user = $teacher->user();
        $teacher->delete();
        $user->delete();
        return redirect()->route('admin.teacher.index')->with(
            [
                'message' => [
                    'type' => 'warning',
                    'text' => 'تم حذف المعلمة بنجاح.',
                ]
            ]
        );
    }

    public function byGrade(Grade $grade)
    {
        $teachers = $grade->teachers()->paginate(10);
        return view('pages.admin.teacher.index', compact('grade', 'teachers'));
    }
}
