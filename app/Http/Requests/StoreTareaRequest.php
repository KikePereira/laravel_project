<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'nombre' => ['required','regex:/^[a-z]+$/i'],
                'apellidos' => ['required','regex:/^[a-z]+$/i'],
                'telefono' => ['required','regex:/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/    '],
                'correo' => ['required','email'],
                'descripcion' => 'required',
                'direccion' => 'required',
                'zip' => ['required','regex:/^([0-9]{5})$/'],
                'poblacion' => ['required','regex:/^[a-z]+$/i'],
                'provincia' => ['required','regex:/^[a-z]+$/i'],
                'empleado' => 'required',
                'cliente' => 'required',
                'fecha_realizacion' => 'required',
                'anotacion_inicio' => 'nullable', 
        ];
    }
}
