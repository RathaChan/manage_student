<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'code',
        'title',
        'cost',
        'description',
        'action',
    ];


    public function timeStudies()
    {
        return $this->hasMany('App\TimeStudy','subject_id');
    }
    public function score()
    {
        return $this->hasMany('App\Score','subject_id');
    }
//        public function student(){
//        return $this->belongsToMany(Students::class);
//    }
//    public function major(){
//        return $this->belongsToMany('Major', 'major_subjects','subject_id','major_id');
//    }
    public function student(){
        return $this->belongsToMany('App\Student', 'timestudys','subject_id','student_id')->withPivot("time_start", "time_end", "day", "status" , "description","id" );
    }
//    public function score(){
//        return $this->belongsToMany('App\Score', 'subject_scores','subject_id','score_id');
//    }
}
