<?php

namespace App\Services;

use Carbon\Carbon;
use App\Http\Requests\Request;
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

    public function saveArticle(Request $request, $user_id)
    {
        $params = $request->all();
        $params['user_id'] = $user_id;

        if (isset($params['id'])) {
            if (! $this->getArticleUpdateAbility($params['id'])) {
                return false;
            }
        }

        // 公開日の設定
        $params['published_at'] =  $params['published_at'].' '.Carbon::now()->toTimeString();
        // insert or update
        $article = $this->article->save($params);

        /** サムネイルの設定 */
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            if ($file->isValid()) {
                $params['image_path'] = $params['uri'].'.'.$file->getClientOriginalExtension();
                $file->move('img/thumbnail', public_path('img/thumbnail'.'/'.$params['image_path']));
            }
        }

        /** 画像のアップロード */
        if ($request->hasFile('content_images')) {
            $image_path = 'img/article/'.$article['id'];
            $content_image_file = $request->file('content_images');
            foreach ($content_image_file as $image) {
                if ($image->isValid()) {
                    $image->move($image_path, $image_path.'/'.$image->getClientOriginalName());
                }
            }
        }

        return $article;
    }

    public function getArticle($entry)
    {
        return $this->article->find($entry);
    }

    public function getArticleById($id)
    {
        return $this->article->findById($id);
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
        return $this->gate->check('update', $this->getArticleById($id));
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

    public function searchArticle($request)
    {
        $this->article->search($request);
    }

}