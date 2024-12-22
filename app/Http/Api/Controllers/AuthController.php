<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\DTOs\UserDTOs\LoginUserDTO;
use App\Http\Api\Requests\LoginUserRequest;
use App\Http\Api\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

// todo прочитать или посмотреть видое про авториазцию + jwt token Laravel passport
// todo разобрать что такое пермиссия
    public function login(LoginUserRequest $userRequest)
    {
        $login = new LoginUserDTO(... $userRequest->validated());
        return $this->userService->loginUser($login);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */

}
