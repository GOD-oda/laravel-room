<?php

namespace App\Repositories;

interface ArticleRepositoryInterface
{
    public function save(array $params);

    public function find($id);

    public function count();

    public function byPage($page = 1, $limit = 20);

}