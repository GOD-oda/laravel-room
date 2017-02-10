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
        'image_path',
    ];

    public function byPage($limit, $page, $isAdmin = false)
    {
        return $this->query()
            ->published($isAdmin)
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function scopePublished($query, $isAdmin = false)
    {
        if (! $isAdmin) {
            return $query->where('published_at', '<=', Carbon::now());
        }

        return $query;
    }

}