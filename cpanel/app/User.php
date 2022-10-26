<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use ReflectionClass;
use Musonza\Chat\Traits\Messageable;

class User extends Authenticatable
{
    use Notifiable, Messageable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public const ADMIN = 0;
    public const TEACHER = 1;
    public const STUDENT = 2;


    public function isAdmin(): bool
    {
        return (int)$this->role === static::ADMIN;
    }

    public function isTeacher(): bool
    {
        return (int)$this->role === static::TEACHER;
    }

    public function isStudent(): bool
    {
        return (int)$this->role === static::STUDENT;
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function setPasswordAttribute($input)
    {
        $this->attributes['password'] = Hash::make($input);
    }

    public function getRoleNameAttribute()
    {
        $role = [
            static::ADMIN => 'مدير',
            static::TEACHER => 'معلمة',
            static::STUDENT => 'طالب',
        ];
        return $role[$this->role];
    }

    public function getRoleKeyAttribute()
    {
        return strtolower(array_search(
            $this->role,
            (new ReflectionClass(self::class))
                ->getConstants(),
            false
        ));
    }
}
