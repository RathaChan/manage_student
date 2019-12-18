<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'date',
        ' status',
        'reason',

    ];
    public function student(){
        return $this->hasMany('App\Student', 'student_id');
    }
}
