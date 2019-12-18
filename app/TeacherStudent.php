<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    protected $table = 'teacher_students';
    protected $fillable = [
        'student_id',
        'teacher_id',
    ];
}
