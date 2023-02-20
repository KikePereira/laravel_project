<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Cliente;
use App\Http\Requests\StoreCuotaRequest;
use App\Http\Requests\UpdateCuotaRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\correo;
use Illuminate\Support\Facades\App;
use PDF;


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
        $destinatario = Cliente::find($cuota['cliente_id'])->correo;
        $cuota=Cuota::orderBy('id', 'desc')->first();
        $pdfContent = $this->generatePDF($cuota);
        // $correo = new Correo(Cliente::find($cuota['cliente_id'])->nombre);
        // Mail::to($destinatario)->send($correo);
        Mail::send([], [], function ($message) use ($pdfContent, $destinatario) {
            $message->to($destinatario)
                    ->subject('Cuota')
                    ->attachData($pdfContent, 'cuota.pdf');
        });
    
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
    public function edit($id)
    {
        $cuota=Cuota::find($id);
        $clientes = Cliente::all();
        return view('Cuota/edit',['cuota'=>$cuota, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCuotaRequest  $request
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $cuota_update=Cuota::find($id);

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
        $cuota_update->update($cuota);
        return redirect()->route('cuota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuota::destroy($id);
        return redirect()->route('cuota.index');
    }

    public function eliminado()
    {
        $cuotas = Cuota::onlyTrashed()->paginate(10);
        return view('Cuota/eliminada',['cuotas'=>$cuotas]);

    }

    public function restore($id)
    {
        Cuota::withTrashed()->find($id)->restore();
      return redirect()->route('cuota.eliminado');
    }

    public function monthly_create()
    {
        return view('Cuota/monthly_create',[]);
    }

    public function monthly_store()
    {
        $clientes=Cliente::all();

        $datos = request()->validate([
            'concepto' => ['required'],
            'fecha_emision' => ['required'],
            'importe' => ['required', 'numeric'],
            'estado' => ['required'],
            'fecha_pago' => ['required'],
            'notas' => ['nullable'],
        ]);

        foreach($clientes as $cliente){
            $datos['cliente_id'] = $cliente->id;
            $datos['direccion'] = $cliente->direccion;

            Cuota::insert($datos);
            
            $destinatario = Cliente::find($datos['cliente_id'])->correo;
            $cuota=Cuota::orderBy('id', 'desc')->first();
            $pdfContent = $this->generatePDF($cuota);
            Mail::send([], [], function ($message) use ($pdfContent, $destinatario) {
                $message->to($destinatario)
                        ->subject('Cuota')
                        ->attachData($pdfContent, 'cuota.pdf');
            });

        }

        return redirect()->route('cuota.index');
    }

    public function pdf($id)
    {
    $cuota = Cuota::findOrFail($id);

    $html = view('cuota.pdf', compact('cuota'))->render();
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML($html);

    return $pdf->stream();
    }

    public function generatePDF(Cuota $cuota)
{
    $pdf = PDF::loadView('cuota.pdf', compact('cuota'));
    $pdfContent = $pdf->output();

    return $pdfContent;
}

}
