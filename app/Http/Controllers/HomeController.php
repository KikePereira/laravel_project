<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tareas=Tarea::paginate(5);
        $empleados=Empleado::paginate(5);
        $clientes=Cliente::paginate(5);
        return view('index',['tareas' => $tareas, 'empleados' => $empleados, 'clientes' => $clientes]);
    }
}
