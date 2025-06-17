<?php
namespace Database\Factories;

use App\Models\Product;
use App\Models\Tenancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tenancy = Tenancy::inRandomOrder()->first();

        return [
            'name'        => fake()->words(3, true),
            'sku'         => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'description' => fake()->paragraph(),
            'tenancy_id'  => $tenancy->id,
        ];
    }
}
