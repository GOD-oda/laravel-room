<?php

namespace App\DataAccess;

use Illuminate\Cache\Cache<amager;

class DataCache implements Cacheable
{
    protected $cache;
    protected $cacheKey;
    protected $minutes;

    public function __construct(CacheManager $cache, $cacheKey, $minutes = null)
    {
        $this->cache = $cache;
        $this->cacheKey = $cacheKey;
        $this->minutes = $minutes;
    }

    public function put($key, $value, $minutes = null)
    {
        if (is_null($minutes)) {
            $minutes = $this->minutes;
        }

        return $this->cache->tags($this->cacheKey)->put($key, $value, $minutes);
    }

    public function has($key)
    {
        return $this->cache->tags($this->cacheKey)->has($key);
    }

    public function forget($key)
    {
        return $this->cache->tags($this->cacheKey)->forget($key);
    }

    public function flush()
    {
        $this->cache->tags($this->cacheKey)->flush();
    }

    /**
     * ページごとにキャッシュするのは後で実装
     * putPaginateCache()
     */





}