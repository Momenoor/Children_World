<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AnswerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AnswerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AnswerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {

        CRUD::setModel(\App\Models\Answer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/answer');
        CRUD::setEntityNameStrings('حل للواجب', 'حلول الواجبات');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('file')->type('image')->label('الحل')->wrapper(['class'=>'border']);
        CRUD::column('homework_id')->label('الواجب');
        CRUD::column('teacher_id')->attribute('name')->label('المعلمة');
        CRUD::column('student_id')->attribute('name')->label('الطالب');
        CRUD::column('grade_id')->label('الصف');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AnswerRequest::class);
        $this->crud->addField([
            'type' => 'select2',
            'label'=> 'الصف',
            'name' => 'grade',
            'allows_null' => true,
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
        CRUD::addField([
            'name' => 'student',
            'entity' => 'student',
            'label' => 'الطالب',
            'attribute' => 'name',
            'type' => 'select2_from_ajax',
            'data_source' => url('api/student'),
            'minimum_input_length' => 0,
            'include_all_form_fields' => true,
            'method' => 'POST',
            'dependencies' => ['grade'],
        ]);
        CRUD::addField([
            'name' => 'homework',
            'entity' => 'homework',
            'label' => 'الواجب',
            'attribute' => 'subject',
            'type' => 'select2_from_ajax',
            'data_source' => url('api/homework'),
            'minimum_input_length' => 0,
            'include_all_form_fields' => true,
            'method' => 'POST',
            'dependencies' => ['grade', 'teacher'],
        ]);
        CRUD::field('file')->type('image')->label('الحل');



        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
