<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'dni' => $this->faker->randomNumber(8, true),
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->lastname(),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->email(),
            'direccion' => $this->faker->streetAddress(),
            'cuenta_corriente' => $this->faker->creditCardNumber(),
            'pais' => $this->faker->country(),
            'moneda' => $this->faker->randomElement(['Euro','Dollar']),
            'importe_mensual' => $this->faker->randomNumber(5, true),
        ];
    }
}
