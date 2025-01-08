<?php

namespace App\Enums;

enum RoleEnum: string {
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case USER = 'user';

    public function roleId(): int
    {
        return match ($this) {
            self::SUPER_ADMIN => 1,
            self::ADMIN => 2,
            self::USER => 3,
        };
    }


    public function  description(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Супер администратор',
            self::ADMIN => 'Администратор',
            self::USER => 'Пользователь',
        };
    }

}
