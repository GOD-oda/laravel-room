<?php

namespace App\Policies;

use App\DataAccess\Eloquent\Article;
use App\User;
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
        return $user->id === (int) $article->user_id;
    }

    public function destroy(User $user, Article $article)
    {
        return $user->id === (int) $article->user_id;
    }
}
