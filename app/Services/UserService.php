<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class UserService
{

    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function getLoggedUser()
    {
        return $this->userRepositoryInterface->getLoggedUser();
    }

    public function getUserById($userId)
    {
        return $this->userRepositoryInterface->getUserById($userId);
    }

    public function getUsers()
    {
        return $this->userRepositoryInterface->getUsers();
    }

    public function createUser($data)
    {
        return $this->userRepositoryInterface->createUser($data);
    }

    public function deleteUser($userId)
    {
        return $this->userRepositoryInterface->deleteUser($userId);
    }
}
