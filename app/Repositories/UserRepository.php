<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\User;

class UserRepository implements UserRepositoryInterface
{
    protected $eloquent;

    public function __construct(User $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function save(array $params)
    {
        return $this->eloquent->create($params);
    }
}