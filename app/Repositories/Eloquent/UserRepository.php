<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\AbstractRepositories;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository extends AbstractRepositories implements UserRepositoryInterface
{
    protected $model = User::class;
}
