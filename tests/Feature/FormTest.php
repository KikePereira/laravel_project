<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Empleado;
use Tests\TestCase;

class FormTest extends TestCase
{
    public function test_cliente_store()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->post('cliente',[
                'dni' => '49106450R',
                'nombre' => 'Enrique',
                'apellidos' => 'Pereira',
                'telefono' => '658512561',
                'correo' => 'kikepereiraramospr@gmail.com',
                'direccion' => 'Calle Camrada Montiel Pichardo',
                'cuenta_corriente' => '123123123123123',
                'pais' => 'España',
                'moneda' => 'Euro',
                'importe_mensual' => '19',
            ]);
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.index');
    }
}
