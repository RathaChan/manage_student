<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    protected $fillable = [
        'teacher_id',
        'student_id',
    ];


}
