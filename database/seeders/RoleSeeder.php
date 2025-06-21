<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'main', 'guard_name' => 'web']);
        Role::create(['name' => 'user', 'guard_name' => 'web']);

        Role::create(['name' => 'admin', 'guard_name' => 'tenant']);
        Role::create(['name' => 'main', 'guard_name' => 'tenant']);
        Role::create(['name' => 'user', 'guard_name' => 'tenant']);
    }
}
