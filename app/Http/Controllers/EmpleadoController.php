<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpleado;
use App\Http\Requests\updateEmpleado;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::paginate(10);
        return view('Empleados.empleado')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("Empleados.empleadoCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpleado $request)
    {
        //


        $empleado = new Empleado();

        $empleado->nombres = $request->input("nombres");
        $empleado->primer_apellido = $request->input("primer_apellido");
        $empleado->segundo_apellido = $request->input("segundo_apellido");
        $empleado->dni = $request->input("dni");
        $empleado->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
        $empleado->sexo = $request->input("sexo");
        $empleado->cargo = $request->input("cargo");
        $empleado->telefono = $request->input("telefono");
        $empleado->procedencia = $request->input("procedencia");
        $empleado->tipo = $request->input("tipo");
        $empleado->Rh = $request->input("Rh");
        $empleado->enfermedades = $request->input("enfermedades");
        $empleado->medicamentos = $request->input("medicamentos");


       // $creado = $empleado->save();

        $data = $request->all();

        // Asignar "ninguno" si está vacio
        if(trim($data['enfermedades']) == '') {
            $data['enfermedades'] = 'ninguno';
        }

        if(trim($data['medicamentos']) == '') {
            $data['medicamentos'] = 'ninguno';
        }

        $empleado = Empleado::create($data);
        $creado = $empleado->save();
        if ($creado) {
            return redirect()->route('empleado.index')
                ->with('mensaje', "Empleado {$empleado->nombre}  creado correctamente");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleados = Empleado::findOrfail($id);
        return view("Empleados.VistaempleadoIndividual", compact('empleados'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view("Empleados.empleadoEdit", compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEdi(Request $request, $id)
    {

        $empleado = Empleado::findOrFail($id);

        $request->validate([
            'nombres' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|between:3,60',
            'primer_apellido' => 'required|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ]+$/u|max:30|not_regex:/\s/',
            'segundo_apellido' => 'nullable|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ]+$/u|max:30|not_regex:/\s/',
            'dni' => [
                'required', 'string', 'maxDigits:13', 'numeric',
                'regex:/^[0-9]+$/',
                'dni_honduras',
                Rule::unique('empleados')->ignore($empleado->id),
            ],
            'fecha_de_nacimiento' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18),'after_or_equal:' . Carbon::now()->subYears(64),
            'sexo' => 'required|in:M,F',
            'cargo' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|between:7,50',
            'telefono' => 'required|regex:/^[2389][0-9]{7}$/',
            'procedencia' => 'required|regex:/^[0-9A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/u|max:200',
            'tipo' => 'required|in:A,B,AB,O',
            'Rh' => 'required|in:+,-',
            'enfermedades' => 'nullable|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\p{P}]+$/u|min:7|max:150',
            'medicamentos' => 'nullable|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\p{P}]+$/u|min:7|max:150',
        ]);

        $request->merge(['empleado' => $empleado]);

        $empleado->nombres = $request->input("nombres");
        $empleado->primer_apellido = $request->input("primer_apellido");
        $empleado->segundo_apellido = $request->input("segundo_apellido");
        $empleado->dni = $request->input("dni");
        $empleado->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
        $empleado->sexo = $request->input("sexo");
        $empleado->cargo = $request->input("cargo");
        $empleado->telefono = $request->input("telefono");
        $empleado->procedencia = $request->input("procedencia");
        $empleado->tipo = $request->input("tipo");
        $empleado->Rh = $request->input("Rh");
        $empleado->enfermedades = $request->input("enfermedades");
        $empleado->medicamentos = $request->input("medicamentos");

        if ($empleado->save()){
            $mensaje = "Los datos generales se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos generales no se editaro nexitosamente";
        }

        return redirect()->route('empleado.index', ['id' => $id])
            ->with('empleado', $empleado)
            ->with('mensaje', $mensaje);
    }

    public function buscar(Request $request)
    {
        $empleados = Empleado::where('nombres', 'LIKE', '%' . $request->texto . '%')
            ->orWhere('primer_apellido', 'LIKE', '%' . $request->texto . '%')
            ->orWhere('segundo_apellido', 'LIKE', '%' . $request->texto . '%')
            ->orWhere('dni', 'LIKE', '%' . $request->texto . '%')
            ->take(10)
            ->get();

        return response()->json($empleados);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
