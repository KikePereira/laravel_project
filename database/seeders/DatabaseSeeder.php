<?php

namespace Database\Seeders;

use \App\Models\Cliente;
use \App\Models\Empleado;
use \App\Models\Tarea;
use \App\Models\Cuota;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory(5)->create();
        Empleado::factory(5)->create();

        Tarea::factory()
            ->count(10)
            ->forCliente()
            ->forEmpleado()
            ->create();
        
        Cuota::factory()
            ->count(10)
            ->forCliente()
            ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
