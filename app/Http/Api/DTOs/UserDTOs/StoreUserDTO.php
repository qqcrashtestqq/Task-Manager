<?php

namespace App\Http\Api\DTOs\UserDTOs;


class StoreUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public int $roleId,
    )
    {

    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->roleId,
        ];
    }

}
