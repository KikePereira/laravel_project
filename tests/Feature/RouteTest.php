<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Empleado;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('auth.login');        
    }

    public function test_login()
    {
        $response = $this->get('/login');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('auth.login');
    }

    public function test_tarea()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/tarea');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Tarea.index');
    }

    public function test_tarea_pendiente()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/pendiente');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Tarea.index');
    }

    public function test_tarea_eliminada()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/eliminada');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Tarea.eliminada');
    }

    public function test_tarea_create()
    {
        $response = $this->get('/tarea/create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertStatus(200);
    }

    // public function test_tarea_store()
    // {
    //     $response = $this->get('/tarea/store');
    
    //     if ($response->status() == 302) {
    //         $response = $this->followRedirects($response);
    //     }
    
    //     $response->assertStatus(200);
    // }

    public function test_tarea_id()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/tarea/1');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Tarea.show');
    }

    public function test_empleado()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/empleado');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Empleado.index');
    }

    public function test_empleado_eliminado()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/empleados/eliminado');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Empleado.eliminada');
    }

    public function test_empleado_create()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/empleado/create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Empleado.create');
    }

    public function test_empleado_id()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/empleado/1');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Empleado.show');
    }

    // public function test_empleado_store()
    // {
    //     $empleado = Empleado::factory()->state([
    //         'tipo' => 'Administrador',
    //     ])->create();

    //     $response = $this->actingAs($empleado)
    //         ->post('empleado',[

    //         ]);
    
    //     if ($response->status() == 302) {
    //         $response = $this->followRedirects($response);
    //     }
    
    //     $response->assertViewIs('Empleado.index');
    // }

    public function test_cliente()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cliente');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.index');
    }

    public function test_cliente_eliminado()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('clientes/eliminado');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.eliminada');
    }

    public function test_cliente_create()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cliente/create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.create');
    }

    public function test_cliente_id()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cliente/1');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.show');
    }

    public function test_cuota()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cuota');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cuota.index');
    }

    public function test_cuota_eliminado()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('cuotas/eliminado');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cuota.eliminada');
    }

    public function test_cuota_create()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cuota/create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cuota.create');
    }

    public function test_cuota_id()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('/cuota/1');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cuota.show');
    }

    public function test_cuota_remesa_mensual()
    {
        $empleado = Empleado::factory()->state([
            'tipo' => 'Administrador',
        ])->create();

        $response = $this->actingAs($empleado)
            ->get('cuotas/monthly_create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cuota.monthly_create');
    }

    public function test_registrarTarea_cliente()
    {

        $response = $this->get('/registrarTarea/create');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('Cliente.registrarTarea');
    }

}
