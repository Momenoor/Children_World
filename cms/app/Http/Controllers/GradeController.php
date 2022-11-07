<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Tables\Grades;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'pages.grade.index',
            [
                'grades' => Grades::class
            ]

        );
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

        Toast::title(__('i.grade added'));
        return redirect()->route('grades.index');
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

        Toast::title(__('i.grade updated'));
        return redirect()->route('grades.index');
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

            Toast::title(__('i.can\'t grade with related data'));
            return redirect()->route('grades.index');
        }
        $grade->delete();
        Toast::title(__('i.grade deleted'));
        return redirect()->route('grades.index');
    }
}
