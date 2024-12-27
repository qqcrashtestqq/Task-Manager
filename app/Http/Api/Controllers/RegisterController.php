<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\DTOs\UserDTOs\StoreUserDTO;
use App\Http\Api\Requests\StoreUserRequest;
use App\Http\Api\Services\UserService;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct(private readonly  UserService $userService)
    {

    }

    public function  registerUser(StoreUserRequest $storeUserRequest)
    {
        $registerUserData = new StoreUserDTO(... $storeUserRequest->validated());
        return $this->userService->store($registerUserData);
    }
}
