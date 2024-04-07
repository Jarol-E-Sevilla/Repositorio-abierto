<?php

namespace App\Http\Controllers;
use App\Models\At2r;
use Illuminate\Http\Request;
use Carbon\Carbon;

class At2rController extends Controller

{
    //

    public function index(Request $request) {
        $busqueda = $request->busqueda;

        $at2rs = At2r::where('id', 'LIKE', '%' . $busqueda . '%')->paginate(25);

        return view('AT2R.lista', ['at2rs' => $at2rs]);
    }

    public function buscar(Request $request) {
        $busqueda = $request->query('busqueda');
        // Obtener la fecha actual
        $fechaActual = Carbon::now()->toDateString();

        // Obtener la fecha actual menos un mes
        $fechaActualMenosUnMes = Carbon::now()->subMonth()->toDateString();

        // Obtener las fechas de la solicitud GET
        $fechaInicio = $request->input('desde', $fechaActualMenosUnMes);
        $fechaFin = Carbon::parse($request->input('hasta', $fechaActual))->endOfDay();

        $at2rs = At2r::where('id', 'LIKE', '%' . $busqueda . '%')
            ->where('created_at', '>=', $fechaInicio)
            ->where('created_at', '<=', $fechaFin)
            ->paginate(25);

        return view('AT2R.lista', ['at2rs' => $at2rs]);
    }



    public function create(){
        return view('AT2R.at2rcrear');
    }

    public function show()
    {
        // Recuperar los datos desde tu modelo At2r
        $datos = At2r::all(); // Esto recuperaría todos los datos de tu modelo At2r

        // Pasar los datos a la vista
        return view('AT2R.At2rIndividual', compact('datos'));
    }

    public function show2($id)
    {
        $at2rs = At2r::findOrfail($id);
        return view('AT2R.at2rUnico', compact('at2rs'));
    }
}
