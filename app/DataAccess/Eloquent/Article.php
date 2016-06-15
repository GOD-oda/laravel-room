<?php

namespace App\DataAccess\Eloquent;

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
        'uri',
        'published_at',
        'user_id',
        'discription',
    ];

    public function byPage($limit, $page, $isLogin=false)
    {
        return $this->query()
            ->published($isLogin)
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
    }

    public function scopePublished($query, $isLogin=false)
    {
        if (! $isLogin) {
            return $query->where('published_at', '<=', Carbon::now());
        }

        return $query;
    }

}