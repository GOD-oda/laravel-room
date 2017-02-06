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
        $this->eloquent->tag_name = $tag_name;
        $result = $this->eloquent->save();

        return $result;
    }

    public function destroy($article_id, $tag_name)
    {
        $tag = $this->eloquent->where([
            ['article_id', '=', $article_id],
            ['tag_name', '=', $tag_name],
        ])->first();
        $result = $tag->delete();

        return $result;
    }

    public function find($article_id)
    {
        return $this->eloquent->where('article_id', $article_id)->get();
    }
}