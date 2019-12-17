<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'code',
        'title',
    ];


    public function student(){
        return $this->morphToMany('App\Student', 'ClassStudent');
    }

}
