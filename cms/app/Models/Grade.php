<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function scheduals()
    {
        return $this->hasMany(Schedual::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
