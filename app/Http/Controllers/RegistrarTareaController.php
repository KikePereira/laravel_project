<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Tarea;


class RegistrarTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente/registrarTarea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedDNI = $request->dni;
        $storedTelefono = $request->telefonoCliente;

        $request->validate([
            'dni' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/',
                function ($atribute, $value, $fail) use ($storedTelefono){
                    if (!Cliente::select('dni')->where('dni', $value)->where('telefono', $storedTelefono)->first()) {
                        $fail('El DNI o telefono introducido no coincide con ningun usuario.');
                    }
                }
            ]
        ]);

        $cliente = Cliente::where('dni', $storedDNI)
            ->where('telefono', $storedTelefono)
            ->first();


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
                'fecha_realizacion' => 'required',
                'anotacion_inicio' => 'nullable',
        ]);

        $tarea['fecha_finalizacion'] = 'dd/mm/yyyy';
        $tarea['empleado_id'] = Null;
        $tarea['cliente_id'] = $cliente->id;
        $tarea['Estado'] = 'Pendiente';
        $tarea['anotacion_final'] = 'Sin anotacion';
        $tarea['created_at']=now();
        Tarea::insert($tarea);
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
