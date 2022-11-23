<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __invoke(Request $request){

        $search_term = $request->input('q'); // the search term in the select2 input

        // if you are inside a repeatable we will send some aditional data to help you
        $triggeredBy = $request->input('triggeredBy'); // you will have the `fieldName` and the `rowNumber` of the element that triggered the ajax

        // NOTE: this is a Backpack helper that parses your form input into an usable array.
        // you still have the original request as `request('form')`
        $form = backpack_form_input();

        $options = Teacher::query()->select('teachers.id','users.name','teachers.user_id')->join('users','teachers.user_id','users.id');

        // if no category has been selected, show no options
        if (! $form['grade']) {
            return [];
        }

        // if a category has been selected, only show articles in that category
        if ($form['grade']) {
            $options = $options->where('grade_id', $form['grade']);
        }

        if ($search_term) {
            $results = $options->where('users.name', 'LIKE', '%'.$search_term.'%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }
}
