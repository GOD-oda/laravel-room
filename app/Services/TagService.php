<?php

namespace App\Services;

use App\Repositories\TagRepositoryInterface;
use App\Repositories\ArticleRepositoryInterface;

class TagService
{
    /** @var TagRepositoryInterface */
    protected $tag;
    /** @var ArticleRepositoryInterface */
    protected $article;

    /**
     * TagService constructor.
     *
     * @param TagRepositoryInterface $tag
     */
    public function __construct(TagRepositoryInterface $tag, ArticleRepositoryInterface $article)
    {
        $this->tag = $tag;
        $this->article = $article;
    }

    /**
     * TODO: attach()の戻り値はvoidなのでreturnが意味ない
     * Save a new tag.
     * @param  array  $credentials tag information
     * @return [type]              [description]
     */
    public function save(array $credentials)
    {
        $tag = $this->tag->save($credentials['tag_name']);
        $article = $this->article->findById($credentials['article_id']);

        return $article->tags()->attach($tag['id']);
    }

    /**
     * Delete tag of one article.
     *
     * @param  array  $credentials article id and tag id.
     * @return int number deleted
     */
    public function destroy(array $credentials)
    {
        $article = $this->article->findById($credentials['article_id']);

        return $article->tags()->detach($credentials['tag_id']);
    }

    /**
     * Get all tag collections.
     * @return collection
     */
    public function getAll()
    {
        return $this->tag->all();
    }

    /**
     * Get all tag name array.
     * @return array
     */
    public function getTagNameList()
    {
        $tags = $this->tag->all();
        $tag_name_list = $tags->map(function ($tag) {
            return $tag->name;
        });

        return $tag_name_list;
    }
}
