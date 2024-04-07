<?php

namespace App\Http\Requests;

use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmpleado extends FormRequest
{

    //protected $empleado;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'enfermedades' => trim($this->enfermedades),
            'medicamentos' => trim($this->medicamentos),
        ]);
    }


    public function rules(): array
    {

        return [
            'nombres' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|between:3,60',
            'primer_apellido' => 'required|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ]+$/u|max:30|not_regex:/\s/',
            'segundo_apellido' => 'nullable|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ]+$/u|max:30|not_regex:/\s/',
            'dni' => 'required|string|maxDigits:13|numeric|dni_honduras|regex:/^[0-9]+$/',
            'fecha_de_nacimiento' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18),'after_or_equal:' . Carbon::now()->subYears(64),
            'sexo' => 'required|in:M,F',
            'cargo' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|between:7,50',
            'telefono' => 'required|regex:/^[2389][0-9]{7}$/',
            'procedencia' => 'required|regex:/^[0-9A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|max:200',
            'tipo' => 'required|in:A,B,AB,O',
            'Rh' => 'required|in:+,-',
            'enfermedades' => 'nullable|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\p{P}]+$/u|min:7|max:150',
            'medicamentos' => 'nullable|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\p{P}]+$/u|min:7|max:150',
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'Los nombres son requeridos.',
            'nombres.regex' => 'El nombre solo puede contener letras y espacios.',
            'nombres.between' => 'Los nombres deben contener entre 3 y 60 caracteres.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'primer_apellido.regex' => 'El primer apellido solo puede contener letras.',
            'primer_apellido.alpha' => 'El primer apellido solo puede contener letras.',
            'segundo_apellido.regex' => 'El segundo apellido solo puede contener letras.',
            'dni.dni_honduras' => 'El DNI no es válido.',
            'dni.required' => 'El número de identidad es obligatorio.',
            'fecha_de_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_de_nacimiento.before_or_equal' => 'La fecha de nacimiento debe ser igual o anterior a 18 años.',
            'fecha_de_nacimiento.after_or_equal' => 'La fecha de nacimiento debe ser igual o posterior a 64 años.',
            'cargo.regex' => 'El cargo solo puede contener letras.',
            'telefono.regex' => 'El número telefónico no es válido.',
            'enfermedades.required' => 'Las enfermedades son obligatorias.',
        ];
    }

    private function validarDNIHonduras($value, $validator, $empleado = null)
    {
        // Verificación de longitud
        if(strlen($value) != 13){
            $validator->errors()->add('dni', 'El DNI debe tener 13 dígitos');
            return false;
        }

        // Verificar que tenga 13 dígitos numéricos
        if (!preg_match('/^[0-9]{13}$/', $value)) {
            $validator->errors()->add('dni', 'El número de identidad debe tener 13 dígitos.');
            return false;
        }

        // Verificar que los dos primeros dígitos estén en el rango de 01 a 18
        $departamento = (int) substr($value, 0, 2);
        if  (!in_array($departamento, range(01, 18))){
            $validator->errors()->add('dni', 'El número de departamentos va de 01 a 18.');
            return false;
        }

        // Verificar que el segundo bloque esté en el rango correcto según el departamento
        $municipio = (int) substr($value, 2, 2);
        $maxMunicipiosPorDepartamento = [28, 16, 10, 21, 23, 12, 19, 28, 6, 17, 4, 19, 28, 16, 23, 28, 16, 11];

        if (!in_array($municipio, range(1, $maxMunicipiosPorDepartamento[$departamento - 1]))) {
            $validator->errors()->add('dni', 'Los datos para el departamento seleccionado no coinciden con el número de municipios válidos.');
            return false;
        }

        // Obtener el año actual
        $anoActual = date('Y');

        // Verificar que el tercer bloque sea un año válido (mayor o igual a 18 años atrás y menor de 64 años atrás)
        $anoInscripcion = (int) substr($value, 4, 4);
        $anoMinimo = $anoActual - 18;
        $anoMaximo = $anoActual - 64;
        if ($anoInscripcion > $anoActual || $anoInscripcion > $anoMinimo || $anoInscripcion <= $anoMaximo) {
            $validator->errors()->add('dni', 'El empleado debe tener una edad mayor de 18 años y menor de 64 años.');
            return false;
        }

        return true;
    }
}
