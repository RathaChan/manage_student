<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected  $fillable = [
        'subject_id',
        'assignment',
        'homework',
        'mid_term',
        'final',
    ];


    public function subject(){
        return $this->belongsTo('Subject', 'subject_id');
    }
}
