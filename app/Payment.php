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

    public function processPaymentType($type)
    {
        if ($type == 1) {
            return '家賃';
        } elseif ($type == 2) {
            return '水道代';
        } elseif ($type == 3) {
            return '電気代';
        } elseif ($type == 4) {
            return 'ガス代';
        } else {
            return '不正な値が登録されています';
        }
    }

    public function scopePaymentType($query, $type)
    {
        if (! empty($type)) {
            return $query->where('type', '=', $type);
        }

        return $query;
    }

    public function scopePayDay($query, $from, $to)
    {
        if (! empty($from) && ! empty($to)) {
            return $query->whereBetween('pay_day', [$from, $to]);
        } elseif (! empty($from)) {
            return $query->where('pay_day', '>=', $from);
        } elseif (! empty($to)) {
            return $query->where('pay_day', '<=', $to);
        }

        return $query;
    }

}