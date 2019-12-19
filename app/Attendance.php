<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'date',
        'status',
        'reason',
        'student_id'
    ];
    public function students(){
        return $this->belongsTo('App\Students', 'student_id');
    }
}
