<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use App\Models\Tarea;

class OperarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->id();
        $tareas=Tarea::where('empleado_id',$id)->paginate(10);
        return view('Tarea/index',['tareas'=>$tareas]);
    }


    public function pendiente()
    {
        $id=auth()->id();
        $tareas = Tarea::where('estado', 'Pendiente')->where('empleado_id',$id)->paginate(10);
        return view('Tarea/index',['tareas'=>$tareas]);
    }

    public function completar($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tareas=Tarea::where('id',$id)->get();
        $tarea=Tarea::find($id);
        return view('Tarea/edit',['tareas'=>$tareas,'tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $tarea=Tarea::find($id);
        $tarea->estado = 'Realizada';
        $tarea->anotacion_final = request('anotacion_final');
        $tarea->fecha_finalizacion = request('fecha_finalizacion');
        $tarea->save();

        $empleado_id=auth()->id();
        $tareas=Tarea::where('empleado_id',$empleado_id)->paginate(10);
        return view('Tarea/index',['tareas'=>$tareas]);
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
