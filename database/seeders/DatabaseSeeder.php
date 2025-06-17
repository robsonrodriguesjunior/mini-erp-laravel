<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            TenancySeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
