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
            'atendido' => 'required|string',
            'fecha_visita' => 'required|date|after_or_equal:1909-01-01',
            'motivo_visita' => 'required|string|between:10,200',
            

        ];
    }

    public function messages()
    {
        return [

            'atendido.required' => 'Los nombres son requerido',
            'atendido.alpha' => 'El nombre solo puede contener letras',
            'fecha_visita.required' => 'Los nombres son requerido',
            'motivo_visita.required' => 'Los nombres son requeridos',

        ];
    }
}
