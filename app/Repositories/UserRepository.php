<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function getLoggedUser()
    {
        return Auth::user();
    }

    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }
}