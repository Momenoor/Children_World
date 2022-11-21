<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

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

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->user->name,
        );
    }
}
