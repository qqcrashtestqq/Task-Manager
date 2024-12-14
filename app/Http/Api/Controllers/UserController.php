<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\DTOs\UserDTOs\StoreUserDTO;
use App\Http\Api\DTOs\UserDTOs\UpdateUserDTO;
use App\Http\Api\Requests\StoreUserRequest;
use App\Http\Api\Requests\UpdateUserRequest;
use App\Http\Api\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function __construct(private readonly UserService $userService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $newUserData = new StoreUserDTO(...$request->validated());
        return $this->userService->store($newUserData);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->userService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $updateUserData = new UpdateUserDTO(... $request->validated());
        return $this->userService->update($updateUserData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->userService->destroy($id);
    }
}
