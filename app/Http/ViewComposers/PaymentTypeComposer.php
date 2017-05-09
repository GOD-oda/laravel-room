<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class PaymentTypeComposer
{
    protected $type;

    public function __construct()
    {
        $this->type = [
            '----',
            '家賃',
            '水道代',
            '電気代',
            'ガス代',
        ];
    }

    public function compose(View $view)
    {
        $view->with('type', $this->type);
    }
}
