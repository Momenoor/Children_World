<?php

namespace App\Http\Controllers\Admin\Operations;

use App\Http\Requests\HomeworkRequest;
use App\Models\Grade;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

trait GradeHomeworkOperation
{

    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    /**
     * Add the default settings, buttons, etc that this operation needs.
     */

    protected function setupGradeHomeworkOperation()
    {
        CRUD::allowAccess('create');
        CRUD::allowAccess('gradeHomework');
        $this->crud->setupDefaultSaveActions();

        /* CRUD::addField([
        'name' => 'grade',
        'label' => 'الصف',
        'type' => 'plain',
        ]);
        CRUD::field('subject')->label('الموضوع');
        CRUD::field('content')->label('المحتوى');
        CRUD::addField([
        'name' => 'file',
        'type' => 'image',
        'label' => 'الملف',
        'upload' => true,
        ]);
        CRUD::addField([
        'name' => 'teacher',
        'entity' => 'teacher',
        'label' => 'المعلمة',
        'attribute' => 'name',
        'type' => 'select2_from_ajax',
        'data_source' => url('api/teacher'),
        'minimum_input_length' => 0,
        'include_all_form_fields' => true,
        'method' => 'POST',
        'dependencies' => ['grade'],
        ]);
        */
    }

    public function gradeHomework(Grade $grade)
    {
        CRUD::hasAccessOrFail('gradeHomework');
        $this->setupCreateOperation();
        $this->crud->modifyField('grade', [
            'value' => $grade->name,
            'type' => 'plain',
        ]);

        if (backpack_user()->hasRole('teacher')) {
            $this->crud->modifyField('teacher', [
                'value' => backpack_user()->teacher->name,
                'type' => 'plain',
            ]);
        } else {
            $this->crud->modifyField('teacher', [
                'type' => 'select2_from_ajax',
                'data_source' => url('api/teacher/?grade=' . $grade->id),
                'include_all_form_fields' => true,
            ]);
        }

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = CRUD::getTitle() ?? 'Grade Homework ' . $this->crud->entity_name;
        $this->data['grade'] = $grade;
        $this->data['saveAction'] = $this->crud->getSaveAction();

        // load the view
        return view('crud::operations.grade_homework', $this->data);
    }

    public function storeGradeHomework(){
        dd($this);
        $this->traitStore();
    }
}
