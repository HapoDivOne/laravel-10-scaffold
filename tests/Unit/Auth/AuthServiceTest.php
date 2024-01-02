<?php

namespace Tests\Unit\Auth;

use App\Enums\ResponseStatus;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use App\Services\Api\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Mockery;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $userRepository;
    protected $user;
    protected $authService;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = Mockery::mock(UserRepository::class);
        $this->authService = new AuthService($this->userRepository);
        $this->user = User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => 'valid_password',
        ]);
    }

    public function test_login_valid()
    {
        $this->userRepository->shouldReceive('getFirstBy')
            ->with('email', 'user@gmail.com')->andReturn($this->user);

        $response = $this->authService->login(['email' => 'user@gmail.com', 'password' => 'valid_password']);

        $this->assertEquals(ResponseStatus::SUCCESS, $response['status']);
        $this->assertEquals(Response::HTTP_OK, $response['code']);
        $this->assertEquals('Success', $response['message']);
        $this->assertArrayHasKey('access_token', $response['data']);
        $this->assertArrayHasKey('token_type', $response['data']);
    }

    public function test_login_invalid_password()
    {
        $this->userRepository->shouldReceive('getFirstBy')
            ->with('email', 'user@gmail.com')->andReturn($this->user);
        Hash::shouldReceive('check')->with('invalid_password', Mockery::any())->andReturn(false);

        $response = $this->authService->login(['email' => 'user@gmail.com', 'password' => 'invalid_password']);

        $this->assertEquals(ResponseStatus::ERROR, $response['status']);
        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $response['code']);
        $this->assertEquals('Unauthorized', $response['message']);
    }

    public function test_logout_valid()
    {
        Sanctum::actingAs($this->user);
        $response = $this->authService->logout($this->user);

        $this->assertEquals(ResponseStatus::SUCCESS, $response['status']);
        $this->assertEquals(Response::HTTP_OK, $response['code']);
        $this->assertEquals('Success', $response['message']);
    }
}
