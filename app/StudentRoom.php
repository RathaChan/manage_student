<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRoom extends Model
{
    protected $table = 'student_rooms';
    protected $fillable = [
        'student_id',
        'room_id',

    ];

}
