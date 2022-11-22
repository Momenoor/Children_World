<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeacherRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Teacher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/teacher');
        CRUD::setEntityNameStrings('معلمة', 'المعلمات');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user')->label('الاسم');
        CRUD::column('phone')->label('الهاتف');
        CRUD::column('specialization')->label('التخصص');
        CRUD::column('grade_id')->label('الصف');
        CRUD::column('user.email')->label('رقم الهوية');

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
        CRUD::setValidation(TeacherRequest::class);

        CRUD::field('user.name')->label('الاسم')->type('text');
        CRUD::field('phone')->label('الهاتف');
        CRUD::field('specialization')->label('التخصص');
        $this->crud->addField([
            'name' => 'grade_id',
            'type' => 'select2',
            'allows_null' => true,
            'label' => 'الصف',
        ]);
        CRUD::field('user.email')->label('رقم الهوية')->type('text');
        CRUD::field('user.password')->label('كلمة المرور')->type('text');
        CRUD::field('user.password_confirmation')->label('تأكيد كلمة المرور')->type('text');

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
        CRUD::setValidation(TeacherRequest::class);

        CRUD::field('name')->label('الاسم')->type('plain');
        CRUD::field('specialization')->label('التخصص');
        CRUD::field('phone')->label('الهاتف');
        $this->crud->addField([
            'name' => 'grade_id',
            'type' => 'select2',
            'allows_null' => true,
            'label' => 'الصف',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    public function store()
    {
        $this->crud->hasAccessOrFail('create');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();

        // register any Model Events defined on fields
        $this->crud->registerFieldEvents();

        if ($request->has('user')) {
            $user = User::create($request->get('user'));

            $user->teacher()->create($request->all());

            $this->data['entry'] = $this->crud->entry = $user->teacher;

            // show a success message
            \Alert::success(trans('backpack::crud.insert_success'))->flash();

            // save the redirect choice for next time
            $this->crud->setSaveAction();

            return $this->crud->performSaveAction($user->teacher->getKey());
        }

        $item = $this->crud->create($this->crud->getStrippedSaveRequest($request));
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }
}
