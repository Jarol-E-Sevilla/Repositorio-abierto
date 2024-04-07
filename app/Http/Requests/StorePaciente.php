<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePaciente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'nombres' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,50',
            'primer_apellido'=>'required|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚ]+$/u',
            'segundo_apellido'=>'nullable|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚ]+$/u',
            'expediente' => 'required|numeric|min:0|max:600',
            'dni' => 'required|numeric|digits:13|dni_paciente',
           /* 'número_de_identidad'=>'required|numeric|digits:13|dni_paciente',*/
            'fecha_de_nacimiento'=>'required|date|after_or_equal:1909-01-01',
            'temperatura' =>'required|numeric|min:32|max:42',
            'sexo'=>'required|in:M,F',
            'peso' => 'required|numeric|min:0|max:500', // Peso en kilogramos
           //'presion_arterial' => 'required|regex:/^\d{2,3}(\||\/)\d{2,3}$/',


        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'Los nombres son requerido',
            'nombres.regex' => 'El nombre solo puede contener letras',
            'primer_apellido.required' => 'el apellido es requerido',
            'primer_apellido.regex' => 'El apellido solo puede contener letras',
            'segundo_apellido.regex' => 'No acepta espacios',
            'expediente.required' => 'No debe ser mayor que 6 digitos',
            'dni.dni_paciente' => 'El DNI no es válido.',
            'dni.required' => 'El número de identidad es obligatorio.',
            'temperatura.required' => 'debe ser un valor numérico entre 32°C y 42°C',
            'peso.required' => 'no puede ser mayor a 500 kilogramos',
            'presion_arterial.required' => 'La presion arterial debe estar entre 40 y 250',
        ];
    }
}
