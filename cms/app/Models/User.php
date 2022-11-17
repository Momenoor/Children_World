<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use ReflectionClass;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
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
