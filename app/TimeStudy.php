<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeStudy extends Model
{
    protected $table = 'timestudys';
    protected $fillable = [
        'student_id',
        'subject_id',
        'day',
        'status',
        'time_start',
        'time_end',
        'description',
    ];

    public function students()
    {
        return $this->belongsTo("App\Students",'student_id');
    }

    public function subjects()
    {
        return $this->belongsTo('App\Subject','subject_id');
    }

    public function minutesToHoursWithShift($minutes)
    {
        if(is_numeric($minutes))
        {
            $hours = (int) ($minutes / 60);
            $minutes -= $hours * 60;
            $sh = "AM";
            if ($hours >= 12) {
                $sh = "PM";
                if($hours == 24)
                    $sh = "AM";
                if($hours >= 13)
                    $hours -= 12;
            }
            elseif($hours == 0){
                $hours = 12;
            }
            return sprintf("%d:%02.0f %s", $hours, $minutes, $sh);
        }
        return $minutes;
    }

    public function getTimeStartAttribute($value)
    {
        return $this->minutesToHoursWithShift($value);
    }

    public function getTimeEndAttribute($value)
    {
        return $this->minutesToHoursWithShift($value);
    }

//    public function student(){
//       return $this->hasMany('App\Student', 'time_study_id');
//    }
}
