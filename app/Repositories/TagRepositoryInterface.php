<?php

namespace App\Repositories;

interface TagRepositoryInterface
{
    public function save($article_id, $tag_name);

    public function delete($article_id, $tag_name);
}