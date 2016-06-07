<?php

namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function getPage($page = 1, $limit = 20)
    {
        $result = $this->article->byPage($page, $limit);

        return new LengthAwarePaginator(
            $result->items, $result->total, $result->perPage, $result->currentPage
        );
    }


}