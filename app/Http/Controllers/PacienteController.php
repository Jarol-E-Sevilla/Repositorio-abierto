<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $busqueda = $request -> busqueda;

        $pacientes = Paciente::where('nombres', 'LIKE', '%'.$busqueda.'%')
            ->paginate(25);

        $data =[
            'pacientes'=>$pacientes,
            'busqueda'=>$busqueda,
        ];

        $pacientes = Paciente::paginate(25);
        return view('Pacientes.paciente', $data ,compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
 
        return view("Pacientes.pacienteCreate");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([

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



    ]);

         
        $paciente = new Paciente();

        $paciente->nombres = $request->input("nombres");
        $paciente->primer_apellido = $request->input("primer_apellido");
        $paciente->segundo_apellido = $request->input("segundo_apellido");
        $paciente->expediente = $request->input("expediente");
        $paciente->dni = $request->input("dni");
        $paciente->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
        $paciente->temperatura = $request->input("temperatura");
        $paciente->sexo = $request->input("sexo");
        $paciente->peso = $request->input("peso");
        $paciente->presion_arterial = $request->input("presion_arterial");
       





        $creado = $paciente->save();

        if ($creado) {
            
            return redirect()->route('paciente.index')
                ->with('mensaje', "Paciente" . $paciente->nombre . " creado correctamente");
        
            }         
}
    /**
     * Display the specified resource.
     */
        public function show($id)
    {
        $pacientes = Paciente::findOrfail($id);
        return view('Pacientes.VistapacienteIndividual', compact('pacientes'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view("Pacientes.pacienteEdit", compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      

         $request->validate([
        

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



            
        ]);
         $paciente = Paciente::findOrfail($id);

        $paciente->nombres = $request->input("nombres");
        $paciente->primer_apellido = $request->input("primer_apellido");
        $paciente->segundo_apellido = $request->input("segundo_apellido");
        $paciente->expediente = $request->input("expediente");
        $paciente->dni = $request->input("dni");
        $paciente->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
        $paciente->temperatura = $request->input("temperatura");
        $paciente->sexo = $request->input("sexo");
        $paciente->peso = $request->input("peso");
        $paciente->presion_arterial = $request->input("presion_arterial");

        $creado = $paciente->save();
       

       if ($creado) {
        return redirect()->route('paciente.index')
                ->with('mensaje', "Paciente" . $paciente->nombre . " actualizado correctamente");
            }
        }

        public function buscar(Request $request)
        {
            $pacientes = Paciente::where('nombres', 'LIKE', '%' . $request->texto . '%')
                ->orWhere('primer_apellido', 'LIKE', '%' . $request->texto . '%')
                ->orWhere('segundo_apellido', 'LIKE', '%' . $request->texto . '%')
                ->orWhere('sexo', 'LIKE', '%' . $request->texto . '%')
                ->orWhere('dni', 'LIKE', '%' . $request->texto . '%')
                ->take(10)
                ->get();
    
            return response()->json($pacientes);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
