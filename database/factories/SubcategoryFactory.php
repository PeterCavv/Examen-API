<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    protected $model = Subcategory::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(asText: true),
            'description' => fake()->sentence(),
            'category_id' => Category::factory(),
        ];
    }
}
