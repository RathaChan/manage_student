<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentes extends Model
{
    protected $fillable = [
        'name',
        'gender',
    ];

    public function attendent(){
        $this->hasMany('App\Attendent', 'student_id');
    }
}
