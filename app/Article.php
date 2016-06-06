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

    public static function search($requests)
    {
        return Article::title($requests->title)
            ->published($requests->published_at)
            ->latest('published_at')
            ->get();
    }

    public function scopePublished($query, $value='')
    {
        if (! empty($value)) {
            return $query->where('published_at', '<=', $value);
        }

        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeTitle($query, $value)
    {
        if (! empty($value)) {
            return $query->where('title', 'like', "%{$value}%");
        }
        return $query;
    }


}
