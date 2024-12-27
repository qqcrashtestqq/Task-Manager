<?php

namespace App\Enums;

enum RoleEnum: string {
    case ADMIN = 'admin';
    case USER = 'user';

    public function roleId(): int
    {
        return match ($this) {
            self::ADMIN => 1,
            self::USER => 2,
        };
    }


}
