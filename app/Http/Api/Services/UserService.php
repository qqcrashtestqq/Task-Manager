<?php

namespace App\Http\Api\Services;


use App\Http\Api\DTOs\UserDTOs\LoginUserDTO;
use App\Http\Api\DTOs\UserDTOs\StoreUserDTO;
use App\Http\Api\DTOs\UserDTOs\UpdateUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client as OClient;

class UserService
{

    public function index()
    {
        $allUsers = User::select('id', 'name', 'email', 'avatar', 'role_id')
            ->with('role:id,name')
            ->get();

        foreach ($allUsers as $user) {
          unset($user->role_id);
        }

        return response()->json($allUsers);
    }


    public function store(StoreUserDTO $storeUserDTO)
    {
        $storeUserDTO->password = Hash::make($storeUserDTO->password);

        $newUser = User::create($storeUserDTO->toArray());

//        todo почему load а не with
        $newUser->load('role:id,name');

        unset($newUser->role_id);

        return $newUser;
    }

    public function loginUser(LoginUserDTO $loginUserDTO)
    {
        $LoginUserData = User::where('email', $loginUserDTO->email)->firstOrFail();

        if (!$LoginUserData || !Hash::check($loginUserDTO->password, $LoginUserData->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $LoginUserData->createToken('myApp')->accessToken;
        return response()->json(
            [
                'message' => 'Auth OK',
                'token' => $token
            ],
            200);
    }


    public function show(int $userId)
    {
        $user = User::select('id', 'name', 'email', 'avatar', 'role_id')->with('role:id,name')->findOrFail($userId);

        unset($user->role_id);

        return $user;
    }


    public
    function update(UpdateUserDTO $updateUserDTO)
    {
        $UpdateUserData = User::findOrFail($updateUserDTO->id);
        $updateUserDTO->password = Hash::make($updateUserDTO->password);
        $UpdateUserData->update($updateUserDTO->toArray());
//       dd($user);
        return $UpdateUserData;
    }


    public function destroy(int $userId)
    {
        return User::destroy($userId);
    }

}
