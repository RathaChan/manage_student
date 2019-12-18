<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = [
        'attendance',
        'homework',
        'mid_term',
        'assignment',
        'final',

    ];

    public function subject(){
        return $this->belongsToMany('App\Subject', 'subject_scores','score_id','subject_id');
    }

}
