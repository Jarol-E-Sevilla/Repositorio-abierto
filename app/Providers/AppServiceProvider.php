<?php

namespace App\Providers;

use App\Models\Empleado;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('dni_honduras', function ($attribute, $value, $parameters, $validator) {
            return $this->validarDNIHonduras($value, $validator);
        });


        Validator::extend('dni_paciente', function ($attribute, $value, $parameters, $validator) {
            return $this->validarDNIPaciente($value, $validator);
        });


        Validator::extend('numero_de_identidad_del_jefe_de_la_casa_fichafam1', function ($attribute, $value, $parameters, $validator) {
                return $this->validarDNIficha($value, $validator);
        });

        Validator::extend('No_identidad_fichafam3', function ($attribute, $value, $parameters, $validator) {
            return $this->validarDNImiembro($value, $validator);
        });

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

    private function validarDNIPaciente($value, $validator)
    {
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

        // Verificar que el tercer bloque sea un año válido (mayor o igual a 18 años atrás)
        $anoInscripcion = (int) substr($value, 4, 4);
        $anoMinimo = $anoActual - 100;
        if ($anoInscripcion > $anoActual || $anoInscripcion < $anoMinimo) {
            $validator->errors()->add('dni', 'El paciente no puede ser mayor a 100 años.');
            return false;
        }

        /*// Verificar que el cuarto bloque esté compuesto por 5 dígitos numéricos
        $cuartoBloque = (int) substr($value, 8, 5);
        if ($cuartoBloque < 0 || $cuartoBloque > 99999) {
            $validator->errors()->add('dni_honduras', 'Los datos del codigo no coinciden con los valores validos.');
            return false;
        }*/

        return true;
    }

    private function validarDNIficha($value, $validator)
    {
        // Verificar que tenga 13 dígitos numéricos
        if (!preg_match('/^[0-9]{13}$/', $value)) {
            $validator->errors()->add('numero_de_identidad_del_jefe_de_la_casa', 'El número de identidad debe tener 13 dígitos.');
            return false;
        }

        // Verificar que los dos primeros dígitos estén en el rango de 01 a 18
        $departamento = (int) substr($value, 0, 2);
        if  (!in_array($departamento, range(01, 18))){
            $validator->errors()->add('numero_de_identidad_del_jefe_de_la_casa', 'El número de departamentos va de 01 a 18.');
            return false;
        }


        // Verificar que el segundo bloque esté en el rango correcto según el departamento
        $municipio = (int) substr($value, 2, 2);
        $maxMunicipiosPorDepartamento = [28, 16, 10, 21, 23, 12, 19, 28, 6, 17, 4, 19, 28, 16, 23, 28, 16, 11];

        if (!in_array($municipio, range(1, $maxMunicipiosPorDepartamento[$departamento - 1]))) {
            $validator->errors()->add('numero_de_identidad_del_jefe_de_la_casa', 'Los datos para el departamento seleccionado no coinciden con el número de municipios válidos.');
            return false;
        }

        // Obtener el año actual
        $anoActual = date('Y');

        // Verificar que el tercer bloque sea un año válido (mayor o igual a 18 años atrás)
        $anoInscripcion = (int) substr($value, 4, 4);
        $anoMinimo = $anoActual - 100;
        if ($anoInscripcion > $anoActual || $anoInscripcion < $anoMinimo) {
            $validator->errors()->add('numero_de_identidad_del_jefe_de_la_casa', 'El jefe de la casa debe tener más de 18 años.');
            return false;
        }

        /*// Verificar que el cuarto bloque esté compuesto por 5 dígitos numéricos
        $cuartoBloque = (int) substr($value, 8, 5);
        if ($cuartoBloque < 0 || $cuartoBloque > 99999) {
            $validator->errors()->add('dni_honduras', 'Los datos del codigo no coinciden con los valores validos.');
            return false;
        }*/

        return true;
    }


    private function validarDNImiembro($value, $validator)
    {
        // Verificar que tenga 13 dígitos numéricos
        if (!preg_match('/^[0-9]{13}$/', $value)) {
            $validator->errors()->add('No_identidad', 'El número de identidad debe tener 13 dígitos.');
            return false;
        }

        // Verificar que los dos primeros dígitos estén en el rango de 01 a 18
        $departamento = (int) substr($value, 0, 2);
        if  (!in_array($departamento, range(01, 18))){
            $validator->errors()->add('No_identidad', 'El número de departamentos va de 01 a 18.');
            return false;
        }

        // Verificar que el segundo bloque esté en el rango correcto según el departamento
        $municipio = (int) substr($value, 2, 2);
        $maxMunicipiosPorDepartamento = [28, 16, 10, 21, 23, 12, 19, 28, 6, 17, 4, 19, 28, 16, 23, 28, 16, 11];

        if (!in_array($municipio, range(1, $maxMunicipiosPorDepartamento[$departamento - 1]))) {
            $validator->errors()->add('No_identidad', 'Los datos para el departamento seleccionado no coinciden con el número de municipios válidos.');
            return false;
        }

        // Obtener el año actual
        $anoActual = date('Y');

        // Verificar que el tercer bloque sea un año válido (mayor o igual a 18 años atrás)
        $anoInscripcion = (int) substr($value, 4, 4);
        $anoMinimo = $anoActual - 100;
        if ($anoInscripcion > $anoActual || $anoInscripcion < $anoMinimo) {
            $validator->errors()->add('No_identidad', 'El miembro familiar no puede ser mayor a 100 años.');
            return false;
        }

        /*// Verificar que el cuarto bloque esté compuesto por 5 dígitos numéricos
        $cuartoBloque = (int) substr($value, 8, 5);
        if ($cuartoBloque < 0 || $cuartoBloque > 99999) {
            $validator->errors()->add('dni_honduras', 'Los datos del codigo no coinciden con los valores validos.');
            return false;
        }*/

        return true;
    }
}
