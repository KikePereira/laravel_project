<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ([
            'descripcion' => $this->faker->paragraph(),
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->lastname(),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->email(),
            'direccion' => $this->faker->streetAddress(),
            'zip' => $this->faker->postcode(),
            'poblacion' => $this->faker->city(),
            'provincia' => $this->faker->city(),
            'estado' => $this->faker->randomElement(['Pendiente','Realizada','Cancelada']),
            'fecha_realizacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_finalizacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'anotacion_inicio' => $this->faker->paragraph(),
            'anotacion_final' => $this->faker->paragraph(),
        ]);
    }
}
