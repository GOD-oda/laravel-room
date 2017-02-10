<?php

namespace App\Services;

use Carbon\Carbon;
use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\TagRepositoryInterface;

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
     * @param  Request $request 入力した情報
     * @param  int  $user_id 記事作成者のid
     * @return collection|false           保存に成功した場合はそのcollection。更新に失敗した場合はfalse。
     */
    public function saveArticle(Request $request, int $user_id)
    {
        $params = $request->all();
        $params['user_id'] = $user_id;

        /** confirm update ability */
        if (isset($params['id'])) {
            if (! $this->getArticleUpdateAbility($params['id'])) {
                return false;
            }
        }

        /** set published_at */
        $params['published_at'] =  $params['published_at'].' '.Carbon::now()->toTimeString();

        /** upload thumbnail  */
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            if ($file->isValid()) {
                $params['image_path'] = $params['uri'].'.'.$file->getClientOriginalExtension();
                $file->move('img/thumbnail', public_path('img/thumbnail'.'/'.$params['image_path']));
            }
        }

        /** insert or update article */
        $article = $this->article->save($params);

        /** insert tag */
        $tag = $this->tag->save($article['id'], $params['tag']);

        /** upload files in article */
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
     * URIで記事を取得するメソッド
     * @param  string $entry URI
     * @return collection        URIに応じた記事の詳細データ
     */
    public function getArticle(string $entry)
    {
        return $this->article->find($entry);
    }

    /**
     * idで記事を取得するメソッド
     * @param  int $id 記事のid
     * @return collection
     */
    public function getArticleById(int $id)
    {
        return $this->article->findById($id);
    }

    /**
     * idで指定した記事のタグを取得するメソッド
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function getTagsOnArticle(int $id)
    {
        return $this->tag->find($id);
    }

    /**
     * 記事一覧を取得するメソッド
     * @param  int|integer  $page    ページ数
     * @param  int|integer  $limit   １ページに表示する記事数
     * @param  bool|boolean $isLogin false: 一般公開、 true: 管理画面
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
     * 対象の記事を更新する権限を持つかの判定
     * @param  int $id 記事のid
     * @return boolean true: 更新可能、 false: 更新不可能
     */
    public function getArticleUpdateAbility(int $id)
    {
        return $this->gate->check('update', $this->getArticleById($id));
    }

    /**
     * 記事を削除するメソッド
     * @param  int $id 記事id
     * @return int 削除した数？
     */
    public function destroyArticle(int $id)
    {
        if (! $this->getArticleDestroyAbility($id)) {
            return false;
        }

        return $this->article->destroy($id);
    }

    /**
     * 対象の記事を削除するする権限を持つかの判定
     * @param  int $id 記事のid
     * @return boolean true: 削除可能、 false: 削除不可能
     */
    public function getArticleDestroyAbility(int $id)
    {
        return $this->gate->check('destroy', $this->getArticle($id));
    }

    /**
     * 指定の記事のタグ削除
     * @param  [type] $article_id [description]
     * @param  [type] $tag_name   [description]
     * @return [type]             [description]
     */
    public function destroyTag($article_id, $tag_name)
    {
        return $this->tag->destroy($article_id, $tag_name);
    }

    /**
     * 記事を検索するメソッド
     * 実装しないかも。
     * Requestじゃなくてstringのほうがいいかも。
     * @param  Request $request 検索内容
     * @return collection           検索結果
     */
    public function searchArticle(Request $request)
    {
        $this->article->search($request);
    }

}