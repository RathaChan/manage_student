<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'student_id',
        'subject_id',
        'attendance',
        'homework',
        'mid_term',
        'assignment',
        'final',

    ];

//    public function subject(){
//        return $this->belongsToMany('App\Subject', 'subject_scores','score_id','subject_id');
//    }

    public function student(){
        return $this->belongsTo('App\Students', 'student_id');
    }
    public function subject(){
        return $this->belongsTo('App\Subject', 'subject_id');
    }

}
