<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuota>
 */
class CuotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'concepto' => $this->faker->word(),
            'fecha_emision' => $this->faker->date(),
            'importe' => $this->faker->randomNumber(5, true),
            'estado' => $this->faker->randomElement(['Pagada','No pagada']),
            'fecha_pago' => $this->faker->date(),
            'direccion' => $this->faker->streetAddress(),
            'notas' => $this->faker->paragraph(),
        ];
    }
}
