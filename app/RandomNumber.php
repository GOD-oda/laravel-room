<?php

namespace App;

use App\Number;

class RandomNumber extends Number
{
    public function __construct()
    {
        parent::__construct(mt_rand(1, 100));
    }
}