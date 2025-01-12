<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Role::truncate();
//        todo что лучше использовать ?
        Role::query()->delete();
        DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1;');

        $roles = [];

        foreach (RoleEnum::cases() as $enum) {
            $roles[] = [
                'name' => $enum->description(),
                'key' => $enum->value,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        Role::query()->insert($roles);

    }
}
