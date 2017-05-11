<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function store(Request $request)
    {
        $credentials = $request->only('tag_name', 'article_id');
        $result = $this->tagService->save($credentials);

        return response()->json(['result' => $result]);
    }

    public function destroy(Request $request)
    {
        $credentials = $request->only('article_id', 'tag_id');
        $result = $this->tagService->destroy($credentials);

        return response()->json(['result' => $result]);
    }
}
