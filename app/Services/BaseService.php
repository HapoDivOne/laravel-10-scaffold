<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Traits\ApiResponse;
use App\Traits\WebResponse;

class BaseService
{
    use ApiResponse, WebResponse;

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function removeToken(User $user): void
    {
        $user->currentAccessToken()->delete();
    }

    public function removeTokens(User $user): void
    {
        $user->tokens()->delete();
    }

    public function setUserLocale(User $user): void
    {
        $language = app()->getLocale();
        if ($user && $user->locale !== $language) {
            $this->userRepository->update($user, ['locale' => $language]);
        }
    }

    public function getDefaultLocalization(): string
    {
        return config('const.default_localization');
    }
}
