<?php
namespace Database\Seeders;

use App\Models\User;
use Database\Factories\TenancyFactory;
use Illuminate\Database\Seeder;

class TenancySeeder extends Seeder
{
    public function run(): void
    {
        User::role('main')->get()->each(function ($mainUser) {
            TenancyFactory::new ()->create([
                'main_user_id' => $mainUser->id,
                'name'         => fake()->company(),
                'tenant'       => fake()->unique()->word(),
            ]);
        });
    }
}
