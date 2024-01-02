<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginRequest;
use App\Http\Requests\Api\Auth\UserLoginRequest;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Services\Api\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @OA\Post(
     ** path="/login",
     *  operationId="authLogin",
     *  tags={"Auth"},
     *  summary="User Login",
     *
     *  @OA\Parameter(
     *      ref="#/components/parameters/accept--language",
     *  ),
     *
     *  @OA\RequestBody(
     *      @OA\JsonContent(),
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",
     *              required={"email", "password"},
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="password", type="password")
     *          ),
     *      ),
     *  ),
     *
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Not Found"
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  )
     * )
     **/
    public function login(ApiLoginRequest $request)
    {
        $response = $this->authService->login($request->validated());
        return $this->getJsonResponse($response['status'], $response['code'], $response['message'], $response['data'] ?? []);
    }

    /**
     * @OA\Post(
     ** path="/logout",
     *  operationId="authLogout",
     *  tags={"Auth"},
     *  summary="User Logout",
     *  security={{"bearerAuth":{}}},
     *
     *  @OA\Parameter(
     *      ref="#/components/parameters/accept--language",
     *  ),
     *
     *  @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Not Found"
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     * )
     **/
    public function logout(Request $request)
    {
        $response = $this->authService->logout($request->user());
        return $this->getJsonResponse($response['status'], $response['code'], $response['message']);
    }

    /**
     * @OA\Post(
     * path="/change-password",
     * operationId="changePassword",
     * tags={"Auth"},
     * summary="Change password",
     * security={{"bearerAuth":{}}},
     *
     * @OA\Parameter(
     *      ref="#/components/parameters/accept--language",
     *  ),
     *
     * @OA\RequestBody(
     *      @OA\JsonContent(),
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",
     *              required={"new_password", "password_confirmed"},
     *              @OA\Property(property="new_password", type="string"),
     *              @OA\Property(property="password_confirmed", type="password")
     *          ),
     *      ),
     *  ),
     *
     * @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *  ),
     * @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *  ),
     * @OA\Response(
     *      response=404,
     *      description="Not Found"
     *  ),
     * @OA\Response(
     *      response=422,
     *      description="Validation Error"
     *  )
     * )
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $userId = $request->user()->id;
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('password_confirmed');

        if ($newPassword !== $confirmPassword) {
            return $this->getJsonResponse(false, 422, 'Confirmation password does not match.');
        }

        $response = $this->authService->updatePassword($userId, $newPassword, $confirmPassword);

        return $this->getJsonResponse($response['status'], $response['code'], $response['message']);
    }
}
