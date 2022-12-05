<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use ReflectionClass;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use \Spatie\Permission\Traits\HasRoles;
    use Notifiable;

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

  /*   protected $with = [
        'student',
        'teacher',
    ]; */

    /* public const ADMIN = 0;
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
 */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    /* public function getRoleNameAttribute()
    {
        $role = [
            static::ADMIN => 'مدير',
            static::TEACHER => 'معلمة',
            static::STUDENT => 'طالب',
        ];
        return $role[$this->role];
    } */

}
