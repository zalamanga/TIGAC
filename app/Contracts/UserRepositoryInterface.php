<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function getLoggedUser();
    public function getUserById($userId);
}