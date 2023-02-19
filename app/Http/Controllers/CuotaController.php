<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Cliente;
use App\Http\Requests\StoreCuotaRequest;
use App\Http\Requests\UpdateCuotaRequest;

class CuotaController extends Controller
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
        $cuotas = Cuota::paginate(8);
        return view('Cuota/index',['cuotas'=>$cuotas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('Cuota/create',['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCuotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $cuota = request()->validate([

            'concepto' => ['required'],
            'fecha_emision' => ['required'],
            'importe' => ['required', 'numeric'],
            'estado' => ['required'],
            'fecha_pago' => ['required'],
            'cliente_id' => ['required'],
            'direccion' => ['required'],
        ]);

        $cuota['notas'] = request('notas');
        Cuota::insert($cuota);
        return redirect()->route('cuota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuota=Cuota::find($id);
        return view('Cuota/show',['cuota'=>$cuota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuota $cuota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCuotaRequest  $request
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCuotaRequest $request, Cuota $cuota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuota $cuota)
    {
        //
    }
}
