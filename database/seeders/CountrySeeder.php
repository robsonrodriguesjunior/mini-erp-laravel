<?php
namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'name'       => 'Brasil',
                'code'       => 'BR',
                'phone_code' => '55',
            ],
            [
                'name'       => 'Estados Unidos',
                'code'       => 'US',
                'phone_code' => '1',
            ],
            [
                'name'       => 'Portugal',
                'code'       => 'PT',
                'phone_code' => '351',
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
