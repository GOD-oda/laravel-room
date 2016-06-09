<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;

class ArticleStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Guard $auth)
    {
        if ($auth->user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:articles',
            'uri' => 'required|max:255|unique:articles',
            'body' => 'required',
            'discription' => 'required',
            'published_at' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '記事名',
            'uri' => '記事のパス',
            'body' => '記事内容',
            'discription' => '記事概要',
            'published_at' => '公開日'
        ];
    }
}
