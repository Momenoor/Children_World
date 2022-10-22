<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'date',
        'teacher_id',
        'student_id',
        'grade_id',
        'rate',
    ];

    protected $dates = [
        'date',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
