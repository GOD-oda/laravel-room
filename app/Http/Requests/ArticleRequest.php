<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required',
            'body'        => 'required',
            'discription' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title'       => '記事名',
            'body'        => '記事内容',
            'discription' => '記事概要',
        ];
    }
}
