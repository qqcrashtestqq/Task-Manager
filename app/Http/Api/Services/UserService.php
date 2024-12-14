<?php

namespace App\Http\Api\Services;


use App\Http\Api\DTOs\UserDTOs\StoreUserDTO;
use App\Http\Api\DTOs\UserDTOs\UpdateUserDTO;
use App\Models\User;

class UserService
{

    public function index()
    {
        return User::select('id', 'name', 'email', 'avatar')->get();

    }


    public function store(StoreUserDTO $dto)
    {
//        todo прочитать про фасад  Hash и переделать
        $dto->password = bcrypt($dto->password);
        return User::create($dto->toArray());
    }


    public function update(UpdateUserDTO $dto)
    {
       $user = User::findOrFail($dto->id);
       $user->update($dto->toArray());
//       dd($user);
       return $user;
    }


    public function delete()
    {

    }

}
