<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;

class ArticleRequest extends Request
{
    public function authorize(Guard $auth)
    {
        if ($auth->user()) {
            return true;
        }

        return false;
    }

    public function rules()
    {
        return [
            'title'        => 'required|max:255|unique:articles',
            'body'         => 'required',
            'discription'  => 'required',
            'published_at' => 'required',
            'thumbnail'    => 'image|size:3'

        ];
    }

    public function attributes()
    {
        return [
            'title'        => '記事名',
            'body'         => '記事内容',
            'discription'  => '記事概要',
            'published_at' => '公開日'
        ];
    }
}
