<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Empleado;
use App\Models\Cliente;

use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;

class TareaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $tareas = tarea::paginate(10);
        return view('Tarea/index',['tareas'=>$tareas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        return view('Tarea/create',['empleados'=>$empleados, 'clientes'=>$clientes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTareaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $tarea = request()->validate([
            'nombre' => ['required','regex:/^[a-z]+$/i'],
                'apellidos' => ['required','regex:/^[a-z]+$/i'],
                'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/    '],
                'correo' => ['required','email'],
                'descripcion' => 'required',
                'direccion' => 'required',
                'zip' => ['required','regex:/^([0-9]{5})$/'],
                'poblacion' => ['required','regex:/^[a-z]+$/i'],
                'provincia' => ['required','regex:/^[a-z]+$/i'],
                'empleado_id' => 'required',
                'cliente_id' => 'required',
                'fecha_realizacion' => 'required',
                'anotacion_inicio' => 'nullable',
        ]);
        $tarea['Estado'] = 'Pendiente';
        $tarea['fecha_finalizacion'] = '16-03-2023';
        $tarea['anotacion_final'] = 'Sin anotacion';

        Tarea::insert($tarea);
        return redirect()->route('tarea.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas=tarea::where('id',$id)->get();
        return view('Tarea/show',['tareas'=>$tareas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareas=Tarea::where('id',$id)->get();
        $tarea=Tarea::find($id);
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        return view('Tarea/edit',['tareas'=>$tareas, 'empleados'=>$empleados, 'clientes'=>$clientes, 'tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTareaRequest  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $tarea_update=Tarea::find($id);
        $tarea = request()->validate([
            'descripcion' => 'required',
            'nombre' => ['required','regex:/^[a-z]+$/i'],
            'apellidos' => ['required','regex:/^[a-z]+$/i'],
            'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/    '],
            'correo' => ['required','email'],
            'direccion' => 'required',
            'zip' => ['required','regex:/^([0-9]{5})$/'],
            'poblacion' => ['required','regex:/^[a-z]+$/i'],
            'provincia' => ['required','regex:/^[a-z]+$/i'],
            'estado' => 'required',
            'fecha_realizacion' => 'required',
            'fecha_finalizacion' => 'required',
            'anotacion_inicio' => 'nullable',
            'anotacion_final' => 'required',
            'empleado_id' => 'required',
            'cliente_id' => 'required',
        ]);
        $tarea_update->update($tarea);
        return redirect()->route('tarea.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
