<?php

namespace App\Tables;

use App\Models\Grade;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Label;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Grades extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Grade::query()->withCount(['teachers', 'students']);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name'])
            ->column('id', label: '#', sortable: true)
            ->column('name', label: __('i.name'), sortable: true)
            ->column('teachers_count', label: __('i.teachers'), searchable: false, sortable: true)
            ->column('students_count', label: __('i.students'), searchable: false, sortable: true)
            ->column('action',label:'#')
            ->simplePaginate(10);

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
