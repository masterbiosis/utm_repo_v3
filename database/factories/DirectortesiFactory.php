<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Directortesi>
 */
class DirectortesiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->name(),
            'apellidop'=>$this->faker->randomElement(["Cruz ","Ramírez","Sánchez","Rodríguez","González","López","Martínez","García","Hernández","Perez","Sosa","Torres","Martínez","Benítez","Morales"]),
            'apellidom'=>$this->faker->randomElement(["Cruz ","Ramírez","Sánchez","Rodríguez","González","López","Martínez","García","Hernández","Perez","Sosa","Torres","Martínez","Benítez","Morales"]),
            'telefono'=>$this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
