<?php

namespace App\DataAccess\Cache;

use App\DataAccess\Cache\Cacheable;
use Illuminate\Cache\CacheManager;

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

    public function get($key)
    {
        return $this->cache->tags($this->cacheKey)->get($key);
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

    public function putPaginateCache(
        $currentPage,
        $perPage,
        $total,
        $items,
        $key,
        $minutes = 10
    ) {
        $cached = new \StdClass;
        $cached->currentPage = $currentPage;
        $cached->items = $items;
        $cached->total = $total;
        $cached->perPage = $perPage;
        $this->put($key, $cached, $minutes);
        return $cached;
    }
}