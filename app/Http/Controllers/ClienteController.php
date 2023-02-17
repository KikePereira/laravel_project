<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tarea;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
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
        $clientes = Cliente::paginate(10);

        return view('Cliente/index',['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $cliente = request()->validate([

            'dni' => ['required'],
            'nombre' => ['required','regex:/^[a-z]+$/i'],
            'apellidos' => ['required','regex:/^[a-z]+$/i'],
            'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['required','email'],
            'direccion' => ['required'],
            'pais' => 'required',
            'moneda' => ['required','regex:/^[a-z]+$/i'],
            'cuenta_corriente' => ['required'],
            'importe_mensual' => ['required','regex:/^[0-9]$/'],
        ]);

        Cliente::insert($cliente);
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas_cliente=Tarea::where('empleado_id',$id)->paginate(5);
        $cliente=Cliente::find($id);
        return view('Cliente/show',['cliente'=>$cliente, 'tareas_cliente'=>$tareas_cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('Cliente/edit',['cliente' =>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $cliente_update=Cliente::find($id);

        $cliente = request()->validate([

            'dni' => ['required'],
            'nombre' => ['required','regex:/^[a-z]+$/i'],
            'apellidos' => ['required','regex:/^[a-z]+$/i'],
            'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['required','email'],
            'direccion' => ['required'],
            'pais' => 'required',
            'moneda' => ['required','regex:/^[a-z]+$/i'],
            'cuenta_corriente' => ['required'],
            'importe_mensual' => ['required','regex:/^[0-9,$]*$/'],
        ]);

        $cliente_update->update($cliente);
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
