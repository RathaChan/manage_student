<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';
    protected $fillable = [
        ' code',
        ' title',
        ' description',
        'action',

    ];
    public function subject(){
        return $this->belongsToMany('Subject', 'major_subjects','major_id','subject_id');
    }
}
