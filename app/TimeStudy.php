<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeStudy extends Model
{
    protected $table = 'timestudys';
    protected $fillable = [
        'status',
        'description',
        'time_start',
        'time_end',

    ];

    public function student(){
       return $this->hasMany('App\Student', 'time_study_id');
    }
}
