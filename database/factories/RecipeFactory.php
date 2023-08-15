<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{

    public function createIngredients(){
        $ingredients = '';
        $units = ['kg', 'l', 'g', 'ml'];
        $count = rand(1,10);
        for($i = 0; $i < $count; $i++){
            $ingredients = $ingredients . '-' . fake()->word() . ' ' . rand(1,50) . $units[rand(0,3)];
        }

        return $ingredients;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'ingredients' => $this->createIngredients()
        ];
    }
}
