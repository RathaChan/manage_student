<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
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
        'course',
        'salary',
        'action',
    ];
    public function student(){
        return $this->morphToMany('App\Student', 'TeacherStudent');
    }
}
