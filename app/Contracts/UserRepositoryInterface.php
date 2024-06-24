<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function getLoggedUser();
    public function getUserById($userId);
    public function getUsers();
    public function createUser($userData);
    public function deleteUser($userId);
}
