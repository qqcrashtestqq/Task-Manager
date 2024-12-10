<?php
namespace App\Http\Api\DTOs\UserDTOs;

class UpdateUserDTO
{
    public function __construct(
        public int $id,
        public string $name,
//        public ?string $avatar,
        public string $email,
        public string $password,
    )
    {

    }

    public function toArray(): array
    {
     return [

         'name' => $this->name,
//         'avatar' => $this->avatar,
         'email' => $this->email,
         'password' => $this->password,
     ];
    }
}
