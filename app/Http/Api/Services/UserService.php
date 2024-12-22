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
        return User::select('id', 'name', 'email', 'avatar')->get();

    }


    public function store(StoreUserDTO $dto)
    {
        $dto->password = Hash::make($dto->password);
        return User::create($dto->toArray());
    }

    public function loginUser(LoginUserDTO $loginUserDTO)
    {
        $loginData = User::where('email', $loginUserDTO->email)->firstOrFail();

        if (!$loginData || !Hash::check($loginUserDTO->password, $loginData->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $loginData->createToken('myApp')->accessToken;
        return response()->json(
            [
                'message' => 'Auth OK',
                'token' => $token
            ],
            200);
    }


    public function show(int $id)
    {
        return User::findOrFail($id);
    }


    public
    function update(UpdateUserDTO $dto)
    {
        $user = User::findOrFail($dto->id);
        $dto->password = Hash::make($dto->password);
        $user->update($dto->toArray());
//       dd($user);
        return $user;
    }


    public function destroy(int $id)
    {
        return User::destroy($id);
    }

}
