<?php

namespace App\Repositories;

interface TagRepositoryInterface
{
    public function save(string $tag_name);

    public function destroy($article_id, $tag_name);
}
