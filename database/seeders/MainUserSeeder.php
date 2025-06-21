<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MainUserSeeder extends Seeder
{
    public function run(): void
    {
        $mainRole = Role::findByName('main', 'web');

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'name'     => fake()->name(),
                'email'    => fake()->unique()->companyEmail(),
                'password' => Hash::make('password'),
            ])->assignRole($mainRole);
        }
    }
}
