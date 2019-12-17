<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendent extends Model
{
    protected $fillable = [
        'student_id',
        'date',
        'status',
        'reason',
    ];

    public function studentes(){
     return   $this->belongsTo('App\Studentes', 'student_id');
    }
}
