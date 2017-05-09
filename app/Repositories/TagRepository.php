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
     * タグの保存.
     *
     * @param [type] $article_id [description]
     * @param [type] $tag_name   [description]
     */
    public function save($article_id, $tag_name)
    {
        $this->eloquent->create([
            'article_id' => $article_id,
            'tag_name'   => $tag_name,
        ]);
    }

    /**
     * 指定の記事のタグの削除.
     *
     * @param [type] $article_id [description]
     * @param [type] $tag_name   [description]
     *
     * @return [type] [description]
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
     * 指定の記事のタグを取得.
     *
     * @param [type] $article_id [description]
     *
     * @return [type] [description]
     */
    public function findByArticleId($article_id)
    {
        return $this->eloquent->where('article_id', $article_id)->get();
    }

    /**
     * 全タグを取得.
     *
     * @return array タグ一覧
     */
    public function getTagNameList()
    {
        return $this->eloquent->groupBy('tag_name')->pluck('tag_name')->all();
    }
}
