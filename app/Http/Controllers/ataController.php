<?php

namespace App\Http\Controllers;
use App\Models\Paciente;

use Illuminate\Http\Request;

class ataController extends Controller
{
    public function create(){
       // return view("atas.ataCrear");
        $pacientes = Paciente::all(); // Recuperar todos los pacientes
        return view("Atas.ataCrear", compact('pacientes')); // Pasar los pacientes a la vista
    }
}
