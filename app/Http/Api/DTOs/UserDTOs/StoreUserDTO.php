<?php

namespace App\Http\Api\DTOs\UserDTOs;


class StoreUserDTO
{
    public function __construct(
        public string $name,
        public ?string $avatar,
        public string $email,
        public string $password
    )
    {

    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

}
