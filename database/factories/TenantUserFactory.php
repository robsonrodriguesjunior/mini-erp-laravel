<?php
namespace Database\Factories;

use App\Models\Tenancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TenantUserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name'           => fake()->name(),
            'username'       => fake()->unique()->userName(),
            'password'       => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'tenancy_id'     => Tenancy::factory(),
        ];
    }
}
