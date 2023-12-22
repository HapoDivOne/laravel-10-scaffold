<?php

namespace App\Services\Api;

use App\Enums\ResponseStatus;
use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $loginData): array
    {
        $user = $this->userRepository->getFirstBy('email', $loginData['email']);
        if (!$user || !Hash::check($loginData['password'], $user->password)) {
            return $this->getServiceResponse(ResponseStatus::ERROR, Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }
        $token = $this->createToken($user);
        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return $this->getServiceResponse(ResponseStatus::SUCCESS, Response::HTTP_OK, 'Success', $data);
    }

    public function logout(User $user): array
    {
        $this->removeToken($user);
        return $this->getServiceResponse(ResponseStatus::SUCCESS, Response::HTTP_OK, 'Success');
    }
}
