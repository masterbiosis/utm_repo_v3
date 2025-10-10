<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programa>
 */
class ProgramaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->randomElement([
                'TSU en multimedia',
                'TSU en desarrollo multiplataforma',
                'ING en multimedia',
                'ING en desarrollo multiplataforma'
            ]),
        ];
    }
}
