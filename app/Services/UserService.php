<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getLoggedUser()
    {
        return $this->userRepository->getLoggedUser();
    }

    public function getUserById($userId)
    {
        return $this->userRepository->getUserById($userId);
    }
}