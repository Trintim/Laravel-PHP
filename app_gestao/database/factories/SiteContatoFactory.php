<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContato;

class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'telefone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->email(),
            'motivo' => $this->faker->numberBetween(1, 3),
            'message' => $this->faker->text(),
        ];
    }
}
