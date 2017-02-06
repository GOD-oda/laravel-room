<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $fillable = [
        'article_id',
        'tag_name',
    ];
}
