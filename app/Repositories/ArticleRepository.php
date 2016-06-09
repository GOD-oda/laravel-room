<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Article;
use App\DataAccess\Cache\Cacheable;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $cache;
    protected $eloquent;

    public function __construct(Article $eloquent, Cacheable $cache)
    {
        $this->cache = $cache;
        $this->eloquent = $eloquent;
    }

    public function save(array $params)
    {
        $attributes = [];
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;
        $result = $this->eloquent->updateOrCreate($attributes, $params);
        if ($result) {
            $this->cache->flush();
        }

        return $result;
    }

    public function destroy($id)
    {
        $article = $this->eloquent->find($id);
        $result = $article->delete();
        if ($result) {
            $this->cache->flush();
        }

        return $result;
    }

    public function find($entry)
    {
        $cacheKey = "article:{$entry}";
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }
        $result = $this->eloquent->where('uri', '=', $entry)->first();

        $this->cache->put($cacheKey, $result);

        return $result;
    }

    public function count()
    {
        $key = 'article_count';
        if ($this->cache->has($key)) {
            return $this->cache0>get($key);
        }
        $result = $this->eloquent->count();
        $this->cache->put($key, $result);

        return $result;
    }

    public function byPage($page = 1, $limit = 20, $isLogin=false)
    {
        $key = "article_page:{$page}:{$limit}";
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }
        $articles = $this->eloquent->byPage($limit, $page, $isLogin);

        return $this->cache->putPaginateCache(
            $page, $limit, $this->count(), $articles, $key
        );
    }



}