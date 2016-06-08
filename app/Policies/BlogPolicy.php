<?php

namespace App\Policies;

use App\User;
use App\DataAccess\Eloquent\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Article $article)
    {
        return $user->id === (int)$article->user_id;
    }
}
