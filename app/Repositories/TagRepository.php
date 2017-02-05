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

    public function save($article_id, $tag_name)
    {
        $this->eloquent->article_id = $article_id;
        $this->eloquent->tag = $tag_name;
        $result = $this->eloquent->save();

        return $result;
    }

    public function delete($article_id, $tag_name)
    {
        $tag = $this->eloquent->first([
            'article_id' => $article_id,
            'tag' => $tag_name,
        ]);
        $result = $tag->delete();

        return $result;
    }
}