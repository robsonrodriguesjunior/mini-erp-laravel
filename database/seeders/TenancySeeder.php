<?php
namespace Database\Seeders;

use App\Models\Tenancy;
use Illuminate\Database\Seeder;

class TenancySeeder extends Seeder
{
    public function run(): void
    {
        Tenancy::factory()->count(10)->create();
    }
}
