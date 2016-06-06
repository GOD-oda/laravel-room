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
        $attributes[$id] = (isset($params['id'])) ? $params['id'] : null;
        $result = $this->eloquent->updateOrCreate($attributes, $params);

        if ($result) {
            $this->cache->flaush();
        }

        return $result;
    }

    public function find($id)
    {
        $cacheKey = "article:{$id}";

        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $result = $this->eloquent->find($id);
        $this->cache->put($cacheKey, $result);

        return $result;
    }

    /**
     * count()
     */

    /**
     * byPage()
     */



}