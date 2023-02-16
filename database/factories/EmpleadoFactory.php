<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dni'=> $this->faker->randomNumber(8, true),
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->lastname(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'password' => bcrypt('123123123'),
            'direccion' => $this->faker->streetAddress(),
            'fecha_alta' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tipo' => $this->faker->randomElement(['Operario','Administrador']),
        ];
    }
}
