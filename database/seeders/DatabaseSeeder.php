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
            RoleSeeder::class,
            AdminUserSeeder::class,
            MainUserSeeder::class,
            TenancySeeder::class,
            TenantUserSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
