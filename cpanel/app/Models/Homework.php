<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Homework extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasImage;
    protected $table = 'homeworks';
    protected $fillable = [
        'subject',
        'content',
        'file',
        'grade_id',
        'teacher_id'
    ];

    public static function boot()
    {
        parent::boot();
        $disk = config('backpack.base.root_disk_name');
        static::deleting(function ($obj) use ($disk) {
            \Storage::disk($disk)->delete('public/' . $obj->file);
        });
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
