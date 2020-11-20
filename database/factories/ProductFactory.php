<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // generate dummies
        $title = Str::title($this->faker->words(5, true));
        $stock = rand(1, 100);
        $price = rand(10, 1000);
        $description = $this->faker->paragraphs(3, true);

        return [
            'title' => $title,
            'description' => $description,
            'stock' => $stock,
            'price' => $price,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
