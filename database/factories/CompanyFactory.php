<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'user_id' => $this->faker->unique()->biasedNumberBetween(1,20),
            'inn' => $this->faker->isbn10(),
            'director' =>$this->faker->name(),
            'info' => $this->faker->text(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->e164PhoneNumber(),
        ];
    }
}
