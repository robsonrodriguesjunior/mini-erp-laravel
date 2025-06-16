<?php
namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDependencies();
        $this->seedClients();
    }

    private function seedDependencies(): void
    {
        // $this->call(CountrySeeder::class);
        // $this->call(StateSeeder::class);
        // $this->call(CitySeeder::class);
    }

    private function seedClients(): void
    {
        Client::factory()->count(50)->create();
    }
}
