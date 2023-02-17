<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Tarea;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = empleado::paginate(10);
        return view('Empleado/index',['empleados'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleado/create',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $empleado = request()->validate([

            'dni' => ['required'],
            'nombre' => ['required','regex:/^[a-z]+$/i'],
            'apellidos' => ['required','regex:/^[a-z]+$/i'],
            'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/    '],
            'email' => ['required','email'],
            'password' => ['required'],
            'direccion' => 'required',
            'fecha_alta' => 'required',
            'tipo' => 'required'
        ]);

        $empleado['password']= bcrypt($empleado['password']);
        Empleado::create($empleado);
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas_empleado=tarea::where('empleado_id',$id)->paginate(5);
        $empleado=Empleado::find($id);
        return view('Empleado/show',['empleado'=>$empleado, 'tareas_empleado'=>$tareas_empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::find($id);
        return view('Empleado/edit',['empleado' =>$empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $empleado_update=Empleado::find($id);
        $empleado = request()->validate([
            'dni' => ['required'],
            'nombre' => ['required','regex:/^[a-z]+$/i'],
            'apellidos' => ['required','regex:/^[a-z]+$/i'],
            'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/    '],
            'email' => ['required','email'],
            'password' => 'required',
            'direccion' => 'required',
            'fecha_alta' => 'required',
            'tipo' => 'required'
        ]);
        $empleado_update->update($empleado);
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
