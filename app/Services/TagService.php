<?php

namespace App\Services;

use App\Repositories\TagRepositoryInterface;

class TagService
{
    protected $tag;

    public function __construct(TagRepositoryInterface $tag)
    {
        $this->tag = $tag;
    }

    public function getAll()
    {
        return $this->tag->getAll();
    }

    public function getTagNameList()
    {
        return $this->tag->getTagNameList();
    }
}