<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id',
        'discription',
    ];

    protected $dates = [
        'published_at',
        'deleted_at'
    ];



}
