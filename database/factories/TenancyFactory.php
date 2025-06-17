<?php
namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Tenancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenancyFactory extends Factory
{
    protected $model = Tenancy::class;

    public function definition(): array
    {
        $brazil = Country::where('code', 'BR')->first();
        $state  = State::where('country_id', $brazil->id)->inRandomOrder()->first();
        $city   = City::where('state_id', $state->id)->inRandomOrder()->first();

        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate   = $this->faker->dateTimeBetween($startDate, '+2 years');

        return [
            'name'       => $this->faker->company(),
            'email'      => $this->faker->unique()->companyEmail(),
            'phone'      => $this->faker->phoneNumber(),
            'document'   => $this->faker->unique()->numerify('##############'),
            'address'    => $this->faker->streetAddress(),
            'city_id'    => $city->id,
            'state_id'   => $state->id,
            'country_id' => $brazil->id,
            'postcode'   => $this->faker->postcode(),
            'start_date' => $startDate,
            'end_date'   => $endDate,
            'status'     => $this->faker->randomElement(['active', 'inactive', 'pending']),
        ];
    }
}
