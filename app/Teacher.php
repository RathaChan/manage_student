<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'code',
        'image',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'address',
        'email',
        'education',
        'salary',
        'action',
    ];


    public function student(){
        return $this->belongsToMany('App\Student', 'teacher_students','teacher_id','student_id');
    }
}
