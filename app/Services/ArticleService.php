<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\ArticleRepositoryInterface;

class ArticleService
{
    protected $article;

    public function __construct(ArticleRepositoryInterface $article, Gate $gate)
    {
        $this->article = $article;
        $this->gete = $gate;
    }

    public function addArticle(array $params)
    {
        if (isset($params['id'])) {
            if (! $this->getArticleAbility($params['id'])) {
                return false;
            }
        }

        return $this->article->save($params);
    }

    public function getArticle($id)
    {
        return $this->article->find($id);
    }

    public function getPage($page = 1, $limit = 20, $isLogin=false)
    {

        $result = $this->article->byPage($page, $limit, $isLogin);

        return new LengthAwarePaginator(
            $result->items, $result->total, $result->perPage, $result->currentPage
        );
    }

    public function getArticleAbility($id)
    {
        return $this->gete->check('update', $this->getArticle($id));
    }


}