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
        'published_at',
        'user_id',
        'discription',
    ];

    public function byPage($limit, $page, $isLogin=false)
    {
        if ($isLogin === true) {
            return $this->query()
                ->orderBy('created_at', 'desc')
                ->skip($limit * ($page - 1))
                ->take($limit)
                ->get();
        }

        return $this->query()
            ->published()
            ->orderBy('created_at', 'desc')
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

}