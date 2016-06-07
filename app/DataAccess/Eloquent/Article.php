<?php

namespace App\DataAccess\Eloquent;

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

    public function byPage($limit, $page)
    {
        return $this->query()
            ->orderBy('created_at', 'desc')
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
    }


}