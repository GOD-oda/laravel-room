<?php

namespace App\DataAccess\Cache;

interface Cacheable
{
    public function get($key);

    public function put($key, $value, $minutes);

    public function has($key);

    public function flash();

    /**
     * putPaginateCache()
     */
}