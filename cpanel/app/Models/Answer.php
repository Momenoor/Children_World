<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasImage;

    protected $fillable = [
        'file',
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
        return $this->belongsTo(Homework::class);
    }
}
