<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::withCount(['students', 'teachers'])->get();
        return view('pages.grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.grade.create');
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
            'name' => 'required|unique:grades',
        ]);

        Grade::create($validated);

        return redirect()->route('grade.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم أضافة الصف بنجاح.',
                ]
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view('pages.grade.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('pages.grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('grades')->ignore($grade->id),
            ],
        ]);
        $grade->update($validated);

        return redirect()->route('grade.index')->with(
            [
                'message' => [
                    'type' => 'success',
                    'text' => 'تم تعديل الصف بنجاح.',
                ]
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        if ($grade->students->isNotEmpty() || $grade->teachers->isNotEmpty()) {
            return redirect()->route('grade.index')->with(
                [
                    'message' => [
                        'type' => 'danger',
                        'text' => 'لا يمكن حذف الصف حيث أنه مرتبط ببيانات أخرى.',
                    ]
                ]
            );
        }
        $grade->delete();
        return redirect()->route('grade.index')->with(
            [
                'message' => [
                    'type' => 'warning',
                    'text' => 'تم حذف الصف بنجاح.',
                ]
            ]
        );
    }
}
