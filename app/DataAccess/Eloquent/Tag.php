<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\DataAccess\Eloquent\Article');
    }
}
