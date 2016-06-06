<?php

namespace App\Repositories;

interface ArticleRepositoryInterface
{
    public function save(array $params);

    public function find($id);

    /**
     * count()
     */

    /**
     * byPage($page = 1, $limit = 20)
     */
}