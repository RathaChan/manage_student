<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorSubject extends Model
{
    protected $table = 'major_subjects';
    protected $fillable = [
        'major_id',
        'subject_id',

    ];

}
