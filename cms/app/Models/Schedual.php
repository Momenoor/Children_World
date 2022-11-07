<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedual extends Model
{
    //

    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'date',
        'grade_id',
        'subject1',
        'subject2',
        'subject3',
        'subject4',
        'subject5',
        'subject6',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
