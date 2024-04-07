<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAta extends FormRequest
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
            //
            'fecha_visita'=>'required|date|',
            'motivo_visita'=>'required|',
            'atendido'=>'required|',
            'paciente_id'=>'required|',
            //El paciente es:
            'tPas'=>'required|',
            //El paciente se considera:
            'considera'=>'required|',
            //La consulta se consideLa consulta se considera:
            'tCon'=>'required|',
            //Hubo detención de:
            'deteccion'=>'required|',
            //En caso de ser embarazo
            'eCon'=>'required|',
            //Control puerpal
            'cPu'=>'required|',
            //Anticonceptivos
            'anticonceptivos'=>'required|',
            //En caso de ser niño (1)
            'n1'=>'required|',
            //En caso de ser niño (2)
            'n2'=>'required|',
            //Atención en embarazo
            'altEmb'=>'',
            //Diadnosticos
            'diagnostico1'=>'required|',
            'diagnostico2'=>'required|',
            'diagnostico3'=>'required|',
        ];
    }
}
