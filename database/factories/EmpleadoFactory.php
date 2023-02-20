<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10),
            'direccion' => $this->faker->streetAddress(),
            'fecha_alta' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tipo' => $this->faker->randomElement(['Operario','Administrador']),
        ];
    }
}
