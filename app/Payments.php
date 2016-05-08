<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'type',
        'utility_charges',
        'pay_day',
        'user_id',
    ];
    protected $dates = [
        'pay_day'
    ];
}
