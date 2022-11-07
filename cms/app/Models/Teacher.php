<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'specialization',
        'grade_id',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
