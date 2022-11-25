<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedual extends Model implements \Momenoor\LaravelFullcalendar\Event
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    //

    protected $dates = [
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'all_day' => 'boolean',
      ];

    protected $fillable = [
        'start_date',
        'end_date',
        'grade_id',
        'teacher_id',
        'title',
        'all_day',
        'subject',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay(){
        return $this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart(){
        return $this->start_date;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd(){
        return $this->end_date;
    }
}
