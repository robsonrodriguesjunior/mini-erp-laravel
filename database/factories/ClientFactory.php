<?php
namespace Database\Factories;

use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        $brazil = Country::where('code', 'BR')->first();
        $state  = State::where('country_id', $brazil->id)->inRandomOrder()->first();
        $city   = City::where('state_id', $state->id)->inRandomOrder()->first();

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
        ];
    }
}
