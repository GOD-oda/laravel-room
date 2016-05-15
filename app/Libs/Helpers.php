<?php

if (! function_exists('processPaymentType')) {
    function processPaymentType($type)
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
}