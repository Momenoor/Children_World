<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Operations\GradeHomeworkOperation;
use App\Http\Requests\HomeworkRequest;
use App\Models\Grade;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class HomeworkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HomeworkCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use GradeHomeworkOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Homework::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/homework');
        CRUD::setEntityNameStrings('واجب', 'الواجبات');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('subject')->label('الموضوع');
        CRUD::column('content')->label('المحتوى');
        CRUD::column('file')->type('image')->label('الملف')->wrapper(['class' => 'border']);
        CRUD::column('grade')->label('الصف');
        CRUD::column('teacher')->label('المعلمة')->attribute('name');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /* protected function setupCreateFromGradeDefaults(){
    CRUD::setValidation(HomeworkRequest::class);
    CRUD::field('subject')->label('الموضوع');
    CRUD::field('content')->label('المحتوى');
    CRUD::addField([
    'name' => 'file',
    'type' => 'image',
    'label' => 'الملف',
    'upload' => true,
    ]);
    CRUD::addField([
    'name' => 'grade',
    'label' => 'الصف',
    'entity' => 'grade',
    'attribute' => 'name',
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
    } */

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {

        CRUD::setValidation(HomeworkRequest::class);

        CRUD::field('subject')->label('الموضوع');
        CRUD::field('content')->label('المحتوى');
        CRUD::addField([
            'name' => 'file',
            'type' => 'image',
            'label' => 'الملف',
            'upload' => true,
        ]);
        if (backpack_user()->hasRole('admin')) {
            CRUD::addField([
                'name' => 'grade',
                'label' => 'الصف',
                'entity' => 'grade',
                'attribute' => 'name',
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
        }
        if (backpack_user()->hasRole('teacher')) {
            CRUD::addField([
                'name' => 'grade_name',
                'label' => 'الصف',
                'type' => 'plain',
                'value' => backpack_user()->teacher->grade->name,
            ]);
            CRUD::addField([
                'name' => 'teacher_name',
                'label' => 'المعلمة',
                'type' => 'plain',
                'value' => backpack_user()->name,
            ]);
            CRUD::addField([
                'name' => 'grade',
                'label' => 'الصف',
                'type' => 'hidden',
                'value' => backpack_user()->teacher->grade->id,
            ]);
            CRUD::addField([
                'name' => 'teacher',
                'label' => 'المعلمة',
                'type' => 'hidden',
                'value' => backpack_user()->teacher->id,
            ]);
        }

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
