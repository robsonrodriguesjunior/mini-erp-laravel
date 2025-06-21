<?php
namespace Database\Factories;

use App\Models\Tenancy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenancyFactory extends Factory
{
    protected $model = Tenancy::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate   = $this->faker->dateTimeBetween($startDate, '+2 years');

        return [
            'main_user_id' => User::role('main')->inRandomOrder()->first()->id,
            'start_date'   => $startDate,
            'end_date'     => $endDate,
            'status'       => $this->faker->randomElement(['active', 'inactive', 'pending']),
        ];
    }
}
