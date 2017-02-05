<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Tag;

class TagRepository implements TagRepositoryInterface
{
    protected $eloquent;

    public function __construct(Tag $eloquent)
    {
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
}