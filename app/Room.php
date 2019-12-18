<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'code',
        'title',
        'description',

    ];


    public function student(){
        return $this->belongsToMany('App\Student', 'student_rooms','room_id','student_id');
    }
}
