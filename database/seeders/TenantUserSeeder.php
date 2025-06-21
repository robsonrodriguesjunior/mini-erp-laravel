<?php
namespace Database\Seeders;

use App\Models\Tenancy;
use Database\Factories\TenantUserFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TenantUserSeeder extends Seeder
{
    public function run(): void
    {
        $userRole = Role::findByName('user', 'tenant');

        Tenancy::all()->each(function ($tenancy) use ($userRole) {
            for ($i = 0; $i < 4; $i++) {
                TenantUserFactory::new ()->create([
                    'tenancy_id' => $tenancy->id,
                ])->assignRole($userRole);
            }
        });
    }
}
