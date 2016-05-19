<?php

namespace App;

class Number
{
    protected $no;

    public function __cunstruct($no = 0)
    {
        $this->no = $no;
    }

    public function getNo()
    {
        return $this->no;
    }
}