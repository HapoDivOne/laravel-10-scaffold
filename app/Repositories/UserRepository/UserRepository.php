<?php

namespace App\Repositories\UserRepository;

use App\Enums\UserEnums;
use App\Models\User;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function getByEmail($email)
    {
        return $this->getFirstBy('email', $email);
    }

    public function updatePassword(int $userId, string $newPassword, string $confirmPassword): bool
    {
        $user = User::findOrFail($userId);

        if ($newPassword !== $confirmPassword) {
            return false;
        }

        $user->password = $newPassword;
        $user->save();

        return true;
    }
}
