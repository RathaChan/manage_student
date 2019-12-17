<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    protected $fillable = [
        'payment_id',
        'student_id',
    ];

}
