<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $name = $this->faker->unique->word(20);
        return [
            'name'=> $name,
            'slug'=>Str::slug($name),
            'color'=> $this->faker->randomElement(['bg-red-600','bg-yellow-600','bg-green-600','bg-blue-600','bg-indigo-600','bg-purple-600','bg-pink-600']),
        ];
    }
}
