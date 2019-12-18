<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectScore extends Model
{
    protected $table = 'subject_scores';
    protected $fillable = [
        'subject_id',
        'score_id',

    ];
}
