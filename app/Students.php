<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'student_code',
        'image',
        'first_name',
        'last_name',
        'gender'
    ];

    public function timeStudies(){
        return $this->hasMany('App\TimeStudy', 'student_id');
    }

    public function attendance(){
        return $this->hasMany('App\Attendance', 'student_id');
    }
    public function score(){
        return $this->hasMany('App\Score', 'student_id');
    }
//        public function subjects(){
//        return $this->belongsToMany(Subject::class);
//    }
//
//    public function room(){
//        return $this->belongsToMany('App\Room', 'student_rooms','student_id','room_id');
//    }
//
    public function subject(){
        return $this->belongsToMany('App\Subject', 'timestudys','student_id','subject_id')->withPivot("time_start", "time_end", "day", "status" , "description" );;
    }
//
//
//
//    public function teacher(){
//        return $this->belongsToMany('App\Teacher', 'teacher_students','student_id','teacher_id');
//    }
}
