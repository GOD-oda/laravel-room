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

    /**
     * Save a new tag or returns a model.
     *
     * @param array $credentials tag information about the specific article.
     *
     * @return mixed
     */
    public function save(string $tag_name)
    {
        return $this->eloquent->firstOrCreate([
            'name'   => $tag_name,
        ]);
    }

    /**
     * TODO: どっかで使われているから直す。
     * Delete the tag from tags table.
     *
     * @param int $article_id article id.
     * @return ?
     */
    public function destroy($article_id, $tag_name)
    {
        $tag = $this->eloquent->where([
            ['article_id', '=', $article_id],
            ['tag_name', '=', $tag_name],
        ])->first();
        $result = $tag->delete();

        return $result;
    }

    /**
     * Get all tag collections.
     *
     * @return collection
     */
    public function all()
    {
        return $this->eloquent->all();
    }

    /**
     * Get a tag collection by tag name.
     * @param  string $tag_name tag name
     * @return collection
     */
    public function findByName(string $tag_name)
    {
        return $this->eloquent->where('name', '=', $tag_name)->first();
    }
}
