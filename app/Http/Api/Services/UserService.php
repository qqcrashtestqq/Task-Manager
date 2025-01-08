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

        unset($allUsers->role_id);

        return response()->json($allUsers);
    }


    public function store(StoreUserDTO $dto)
    {
        $dto->password = Hash::make($dto->password);

        $newUser = User::create($dto->toArray());

//        todo почему load а не with
        $newUser->load('role:id,name');

        unset($newUser->role_id);

        return $newUser;
    }

    public function loginUser(LoginUserDTO $loginUserDTO)
    {
        $user = User::where('email', $loginUserDTO->email)->firstOrFail();

        if (!$user || !Hash::check($loginUserDTO->password, $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        $token = $user->createToken('myApp')->accessToken;
        return response()->json(
            [
                'message' => 'Auth OK',
                'token' => $token
            ],
            200);
    }


    public function show(int $id)
    {
        $user = User::select('id','name','email','avatar','role_id')->with('role:id,name')->findOrFail($id);

        unset($user->role_id);

        return $user;
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
