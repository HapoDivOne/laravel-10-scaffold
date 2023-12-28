<?php

namespace Tests\Unit\Auth;

use App\Enums\ResponseStatus;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use App\Services\Api\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_correct_credentials()
    {
        // Setup
        $userRepository = Mockery::mock(UserRepository::class);
        $user = Mockery::mock(User::class);
        $stdClass = new stdClass();
        $stdClass->plainTextToken = 'token';
        $user->shouldReceive('createToken')->andReturn($stdClass);
        $user->shouldReceive('getAttribute')->andReturn('token');
        $userRepository->shouldReceive('getFirstBy')
            ->with('email', 'user@gmail.com')->andReturn($user);
        Hash::shouldReceive('check')->with('valid_password', Mockery::any())->andReturn(true);

        $authService = new AuthService($userRepository);

        // Act
        $response = $authService->login(['email' => 'user@gmail.com', 'password' => 'valid_password']);

        // Assert
        $this->assertEquals(ResponseStatus::SUCCESS, $response['status']);
        $this->assertEquals(Response::HTTP_OK, $response['code']);
        $this->assertEquals('Success', $response['message']);
        $this->assertArrayHasKey('access_token', $response['data']);
        $this->assertArrayHasKey('token_type', $response['data']);
    }

    public function test_logout_with_correct_credentials()
    {
        //setup
        $authServiceMock = Mockery::mock(AuthService::class);
        $userRepository = Mockery::mock(UserRepository::class);
        $userRepository->shouldReceive('getFirstBy')
            ->with('email', 'user@gmail.com')->andReturn();
        $authServiceMock->shouldReceive('removeToken')->andReturn(true);

        $authService = new AuthService($userRepository);
//        $response = $authService->logout(new User());
    }

}
