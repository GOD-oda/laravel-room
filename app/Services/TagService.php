<?php

namespace App\Services;

use App\Repositories\TagRepositoryInterface;

class TagService
{
    /** @var TagRepositoryInterface  */
    protected $tag;

    /**
     * TagService constructor.
     * @param TagRepositoryInterface $tag
     */
    public function __construct(TagRepositoryInterface $tag)
    {
        $this->tag = $tag;
    }

    /**
     *
     * @return mixed
     */
    public function getTagNameList()
    {
        return $this->tag->getTagNameList();
    }
}