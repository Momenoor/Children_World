<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function __invoke(Request $request){

        $search_term = $request->input('q'); // the search term in the select2 input

        // if you are inside a repeatable we will send some aditional data to help you
        $triggeredBy = $request->input('triggeredBy'); // you will have the `fieldName` and the `rowNumber` of the element that triggered the ajax

        // NOTE: this is a Backpack helper that parses your form input into an usable array.
        // you still have the original request as `request('form')`
        $form = backpack_form_input();

        $options = Homework::query();

        // if no category has been selected, show no options
        if (! $form['teacher'] || ! $form['grade']) {
            return [];
        }

        // if a category has been selected, only show articles in that category
        if ($form['grade']) {
            $options = $options->where('grade_id', $form['grade']);
        }

        if ($form['teacher']) {
            $options = $options->where('teacher_id', $form['teacher']);
        }

        if ($search_term) {
            $results = $options->where('homework.subject', 'LIKE', '%'.$search_term.'%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }
}
