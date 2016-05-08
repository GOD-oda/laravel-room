<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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

    public function processPaymentType($no)
    {
        if ($no == 1) {
            return '家賃';
        } elseif ($no == 2) {
            return '水道代';
        } elseif ($no == 3) {
            return '電気代';
        } elseif ($no == 4) {
            return 'ガス代';
        } else {
            return '不正な値が登録されています';
        }
    }
}
