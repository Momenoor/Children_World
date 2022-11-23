<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SchedualRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class SchedualCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SchedualCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Schedual::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/schedual');
        CRUD::setEntityNameStrings('الخطة الاسبوعية', 'الخطط الاسبوعية');
        CRUD::setListView('pages.schedual.list');
        Widget::add()->type('style')->content('packages/fullcalendar/main.min.css');
        Widget::add()->type('script')->content('packages/fullcalendar/main.min.js');
        Widget::add()->type('script')->content('packages/fullcalendar/locales-all.min.js');
        Widget::add()->type('script')->content('packages/moment/min/moment-with-locales.min.js');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->calendar = app('laravel-fullcalendar')->addEvents($this->crud->getModel()->all())->setOptions(['locale' => 'ar']);

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
        CRUD::setValidation(SchedualRequest::class);

        CRUD::field('start_date')->type('datetime')->label('البداية');
        CRUD::field('end_date')->type('datetime')->label('النهاية');
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
        CRUD::field('title')->label('البيان');
        CRUD::addField(
            [
                'name' => 'all_day',
                'type' => 'toggle',
                'view_namespace' => 'toggle-field-for-backpack::fields',
                'label' => 'طوال اليوم'
            ]
        );
        CRUD::field('subject')->label('المادة')->type('select2_from_array')->options([
            'مفاهيم لغوية',
            'مفاهيم حسابية',
            'التربية الاسلامية',
            'القرآن الكريم',
            'العلوم',
            'اللغة الانجليزية',
        ])->allows_null(true);

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
}
