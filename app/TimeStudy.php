<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeStudy extends Model
{
    protected $table = 'timestudys';
    protected $fillable = [
        'student_id',
        'subject_id',
        'status',
        'time_start',
        'time_end',
        'description',
        'day',

    ];

//    public function student(){
//       return $this->hasMany('App\Student', 'time_study_id');
//    }
}
