<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaymentRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|numeric',
            'utility_charges' => 'required|numeric',
            'pay_day' => 'required|date'
        ];
    }

    public function attributes()
    {
        return [
            'type' => '種類',
            'utility_charges' => '料金',
            'pay_day' => '支払日'
        ];
    }
}
