<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultaController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        $consultas = Consulta::whereHas('paciente', function ($query) use ($busqueda) {
            $query->where('nombres', 'LIKE', '%' . $busqueda . '%');
        })->with('paciente')->paginate(25);

        $data = [
            'consultas' => $consultas,
            'busqueda' => $busqueda,
        ];

        return view('Consultas.consulta', $data);
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->query('busqueda');
        // Obtener la fecha actual
        $fechaActual = Carbon::now()->toDateString();

        // Obtener la fecha actual menos un mes
        $fechaActualMenosUnMes = Carbon::now()->subMonth()->toDateString();

        // Obtener las fechas de la solicitud GET
        $fechaInicio = $request->input('desde', $fechaActualMenosUnMes);
        $fechaFin = $request->input('hasta', $fechaActual);

        if ($busqueda != null && $busqueda != '') {
            $consultas = Consulta::whereBetween('fecha_visita', [$fechaInicio, $fechaFin])->whereHas('paciente', function ($query) use ($busqueda) {
                $query->where('nombres', 'LIKE', '%' . $busqueda . '%');
            })
                ->with('paciente')->paginate(25);
        } else {
            $consultas = Consulta::whereHas('paciente', function ($query) use ($busqueda) {
                $query->where('nombres', 'LIKE', '%' . $busqueda . '%');
            })
                ->with('paciente')->paginate(25);
            
        }



        $data = [
            'consultas' => $consultas,
            'busqueda' => $busqueda,
        ];

        return view('Consultas.consulta', $data);
    }


    public function create()
    {
        // Recupera los datos del paciente que deseas mostrar en el formulario
        $pacientes = Paciente::all(); // Aquí puedes personalizar cómo recuperas el paciente

        // Realizar la consulta para obtener solo los médicos disponibles de la tabla de empleados
        $medicos = Empleado::where('cargo', 'Médico')->get();

        // Pasa los datos del paciente y los médicos disponibles a la vista
        return view("Consultas.consultaCreate", compact('pacientes', 'medicos'));
    }





    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'atendido' => 'required|string',
            'fecha_visita' => 'required|date|after_or_equal:1909-01-01',
            'motivo_visita' => 'required|string|between:10,200',
            'paciente_id' => 'required|numeric|digits:13',
        ]);

        // Buscar al paciente por su DNI
        $paciente = Paciente::where('dni', $request->input("paciente_id"))->first();
        $doctor = Empleado::where('id', $request->input('atendido'))->first();

        // Verificar si el paciente existe
        if (!$paciente) {
            return redirect()->back()->withErrors(['paciente_id' => 'Número de identidad no existe en la Base Datos'])->withInput();

        }

        // Crear una nueva consulta con los datos proporcionados
        $consulta = new Consulta();
        $consulta->atendido = $doctor->nombres . " " . $doctor->primer_apellido . " " . $doctor->segundo_apellido;
        $consulta->fecha_visita = $request->input("fecha_visita");
        $consulta->motivo_visita = $request->input("motivo_visita");
        $consulta->paciente_id = $paciente->id;

        // Guardar la consulta en la base de datos
        $consulta->save();

        // Redirigir a la vista de creación de consulta con un mensaje de éxito
        return redirect()->route('consulta.index')->with('mensaje', "Consulta creada exitosamente");
    }

    public function show($id)
    {
        $consulta = Consulta::where('id', $id)->first();

        // Verificar si la consulta fue encontrada
        if ($consulta) {
            $consulta->load('paciente');
        }


        return view('Consultas.Vistaconsultaindividual', compact('consulta'));
    }

    public function edit(string $id)
    {
        // Realizar la consulta para obtener solo los médicos disponibles de la tabla de empleados
        $medicos = Empleado::where('cargo', 'Médico')->pluck('nombres', 'id');

        $consulta = Consulta::where('id', $id)->with('paciente')->first();
        return view('Consultas.consultaEdit', compact('consulta', 'medicos'));


    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'motivo_visita' => 'required|string|between:10,200',
        ]);

        // Recuperar la consulta existente
        $consulta = Consulta::where('id', $id)->first();

        if ($consulta) {
            // Actualizar los campos con los nuevos valores
            $consulta->motivo_visita = $request->input("motivo_visita");

            // Guardar la consulta actualizada
            $actualizado = $consulta->save();

            if ($actualizado) {
                return redirect()->route('consulta.index')
                    ->with('mensaje', "Consulta actualizada correctamente");
            } else {
                // Manejar el caso donde la consulta no se pudo actualizar
                return back()->withInput()->with('error', 'No se pudo actualizar la consulta');
            }
        } else {
            // Manejar el caso donde no se encontró la consulta
            return back()->with('error', 'Consulta no encontrada');
        }
    }

}



