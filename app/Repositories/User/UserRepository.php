<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function getList($params = null)
    {
        return User::get();
    }

    public function getLogin($username, $password)
    {
        return User::query()
            ->where('username', $username)
            ->where('password', $password)
            ->first();
    }

    public function getUsers()
    {
        return User::query()
            ->get();
    }
}
