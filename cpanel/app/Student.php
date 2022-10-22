<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'born_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'born_at',
        'phone',
        'grade_id',
        'user_id'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getAgeAttribute()
    {
        return $this->born_at->age;
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

}
