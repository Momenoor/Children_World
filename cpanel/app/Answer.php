<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'answer',
        'homework_id',
        'teacher_id',
        'student_id',
        'grade_id',
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

    public function homework()
    {
        return $this->belongsTo(Student::class);
    }
}
