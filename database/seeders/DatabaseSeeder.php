<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Roles\RoleUser;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (Role::query()->count() === 0) {
            Role::query()->create(['name' => 'admin']);
            Role::query()->create(['name' => 'moderator']);
            Role::query()->create(['name' => 'editor']);
            Role::query()->create(['name' => 'user']);
        }
//        if (UserRole::query()->count() === 0) {
//            UserRole::factory(3)->create();
//        }
        // \App\Models\User::factory(10)->create();
    }
}
