<?php

namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\TagRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    protected $article;
    protected $tag;

    public function __construct(ArticleRepositoryInterface $article, Gate $gate, TagRepositoryInterface $tag)
    {
        $this->article = $article;
        $this->gate = $gate;
        $this->tag = $tag;
    }

    /**
     * 記事の保存処理を行うメソッド。
     * 新規登録か更新かは受け取ったリクエストにidがセットされているかどうかで判断する。
     *
     * @param Request $request 入力した情報
     * @param int     $user_id 記事作成者のid
     *
     * @return collection|false 保存に成功した場合はそのcollection。更新に失敗した場合はfalse。
     */
    public function saveArticle(Request $request, int $user_id)
    {
        $params = $request->all();
        $params['user_id'] = $user_id;

        /* confirm update ability */
        if (isset($params['id'])) {
            if (!$this->getArticleUpdateAbility($params['id'])) {
                return false;
            }
        }

        /* set published_at */
        $params['published_at'] = $params['published_at'].' '.Carbon::now()->toTimeString();

        /* upload thumbnail  */
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            if ($file->isValid()) {
                $params['image_path'] = $params['uri'].'.'.$file->getClientOriginalExtension();
                $file->move('img/thumbnail', public_path('img/thumbnail'.'/'.$params['image_path']));
            }
        }

        /** insert or update article */
        $article = $this->article->save($params);

        /* insert tag */
        if (!empty($params['tag'])) {
            $tags = explode(',', $params['tag']);
            foreach ($tags as $tag) {
                $this->tag->save($article['id'], $tag);
            }
        }

        /* upload files in article */
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

    /**
     * Get a article by URL
     *
     * @param string $entry URL
     *
     * @return collection
     */
    public function getArticle(string $entry)
    {
        return $this->article->find($entry);
    }

    /**
     * Get a article by id.
     *
     * @param int $id article id.
     *
     * @return collection
     */
    public function getArticleById(int $id)
    {
        return $this->article->findById($id);
    }

    /**
     * Get article list of tag name.
     *
     * @param string  $tag_name tag name.
     * @param int|int $page     page number.
     * @param int|int $limit    number of articles per a page.
     *
     * @return LengthAwarePaginator
     */
    public function getArticleByTag(string $tag_name, int $page = 1, int $limit = 20)
    {
        $tag = $this->tag->findByName($tag_name);

        $result = $this->article->byTag($tag->id, $page, $limit);

        return new LengthAwarePaginator(
            $result->items, $result->total, $result->perPage, $result->currentPage
        );
    }

    /**
     * Get article list.
     *
     * @param int|int   $page    ページ数
     * @param int|int   $limit   １ページに表示する記事数
     * @param bool|bool $isLogin false: 一般公開、 true: 管理画面
     *
     * @return collection
     */
    public function getPage(int $page = 1, int $limit = 20, bool $isLogin = false)
    {
        $result = $this->article->byPage($page, $limit, $isLogin);

        return new LengthAwarePaginator(
            $result->items, $result->total, $result->perPage, $result->currentPage
        );
    }

    /**
     * Determine whether you have authority to update the target article.
     *
     * @param int $id article id.
     *
     * @return bool true: have authority、false: don't have authority
     */
    public function getArticleUpdateAbility(int $id)
    {
        return $this->gate->check('update', $this->getArticleById($id));
    }

    /**
     * Delete a article.
     *
     * @param int $id article id.
     *
     * @return int number deleted.
     */
    public function destroyArticle(int $id)
    {
        if (!$this->getArticleDestroyAbility($id)) {
            return false;
        }

        return $this->article->destroy($id);
    }

    /**
     * Determine whether you have authority to delete the target article.
     *
     * @param int $id article id.
     *
     * @return bool true: have authority、 false: don't have authority
     */
    public function getArticleDestroyAbility(int $id)
    {
        return $this->gate->check('destroy', $this->getArticle($id));
    }

    /**
     * TODO: 未実装
     * 記事を検索するメソッド
     * Requestじゃなくてstringのほうがいいかも。
     *
     * @param Request $request 検索内容
     *
     * @return collection 検索結果
     */
    public function searchArticle(Request $request)
    {
        return $this->article->search($request);
    }
}
