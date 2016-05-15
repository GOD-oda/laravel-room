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

    public function search($requests)
    {
        return Payment::paymentType($requests->type)
            ->payDay($requests->from_date, $requests->to_date)
            ->get();
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
