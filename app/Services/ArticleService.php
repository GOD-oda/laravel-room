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
        $this->gate = $gate;
    }

    public function addArticle(array $params)
    {
        if (isset($params['id'])) {
            if (! $this->getArticleUpdateAbility($params['id'])) {
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

    public function getArticleUpdateAbility($id)
    {
        return $this->gate->check('update', $this->getArticle($id));
    }

    public function destroyArticle($id)
    {
        if (! $this->getArticleDestroyAbility($id)) {
            return false;
        }

        return $this->article->destroy($id);
    }

    public function getArticleDestroyAbility($id)
    {
        return $this->gate->check('destroy', $this->getArticle($id));
    }

}