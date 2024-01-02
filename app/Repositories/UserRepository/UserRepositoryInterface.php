<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getByEmail($email);

    public function updatePassword(int $userId, string $newPassword, string $confirmPassword): bool;
}
