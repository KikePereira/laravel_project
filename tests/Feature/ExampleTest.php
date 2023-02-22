<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Empleado;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_authentication(): void
    {
        $user = Empleado::factory()->create();
 
        $response = $this->actingAs($user)
                         ->get('/');
                         
        
        $response->assertStatus(200);

    }

}
