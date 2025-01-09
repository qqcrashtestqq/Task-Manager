<?php

namespace App\Http\Api\Controllers;


use App\Http\Api\DTOs\UserDTOs\StoreUserDTO;
use App\Http\Api\DTOs\UserDTOs\UpdateUserDTO;
use App\Http\Api\Requests\StoreUserRequest;
use App\Http\Api\Requests\UpdateUserRequest;
use App\Http\Api\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    public function store(StoreUserRequest $storeUserRequest)
    {
        try {
            DB::beginTransaction();

            $newUserData = new StoreUserDTO(...$storeUserRequest->validated());
            $newUser = $this->userService->store($newUserData);

            DB::commit();

            return $newUser;
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json($exception);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(int $userId)
    {
        return $this->userService->show($userId);
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
    public function update(UpdateUserRequest $updateUserRequest)
    {
        $updateUserData = new UpdateUserDTO(... $updateUserRequest->validated());
        return $this->userService->update($updateUserData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $userId)
    {
        return $this->userService->destroy($userId);
    }
}
