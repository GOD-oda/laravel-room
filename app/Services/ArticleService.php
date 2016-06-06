<?php

namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;

class ArticleService
{
    protected $article;

    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->article = $article;
    }

    public function addArticle(array $attributes)
    {
        return $this->article->create($attributes);
    }

    public function getArticle($id)
    {
        return $this->article->find($id);
    }

    /**
     * まだ実装しない
     * @param  integer $page  [description]
     * @param  integer $limit [description]
     * @return [type]         [description]
     */
    /*
    public function getPage($page = 1, $limit = 20)
    {
        $result = $this->article->byPage($page, $limit);

        return new LengthAwarePaginator(
            $result->items, $result->total, $result->perPage, $result->currentPage
        );
    }
    */


}