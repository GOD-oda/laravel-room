<?php

namespace App\Repositories;

interface TagRepositoryInterface
{
    public function save($article_id, $tag_name);

    public function destroy($article_id, $tag_name);

    public function findByArticleId($article_id);
}
