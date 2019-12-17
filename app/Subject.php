<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'title',
        'teacher_id',
        'major_id',
        'description',
        'action',
    ];


    public function student(){
        return $this->morphToMany('App\Student', 'SubjectStudent');
    }
    public function score(){
        $this->hasMany('Score', 'subject_id');
    }

}
