<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $fillable = [
        'code',
        'image',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'address',
        'phone_number',
        'email',
        'year',
        'major',
        'action',
    ];

    public function teacher(){
        return $this->morphToMany('App\Teacher', 'TeacherStudent');
    }

    public function class(){
        return $this->morphToMany('App\Room', 'ClassStudent');
    }

    public function subject(){
        return $this->morphToMany('App\Subject', 'SubjectStudent');
    }

}
