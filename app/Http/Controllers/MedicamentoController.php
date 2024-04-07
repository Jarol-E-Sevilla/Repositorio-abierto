<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpleado;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("Medicamentos.medicamentoCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([

        'nombre_medicamento' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,50',
        'compuestos' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
        'descripcion' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,100',

    ]);


        $medicamento = new Medicamento();

        $medicamento->nombre_medicamento = $request->input("nombre_medicamento");
        $medicamento->compuestos = $request->input("compuestos");
        $medicamento->descripcion = $request->input("descripcion");
        $creado = $medicamento->save();
         return redirect()->route('medicamento.create')
                ->with('mensaje', "Medicamento {$medicamento->nombre}  creado correctamente");


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicamento = Medicamento::findOrfail($id);
        return view('Medicamentos.MedicamentoEdit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'nombre_medicamento' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:0,120',
            'compuestos' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:0,180',
            'descripcion' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:0,128',

        ]);


        $medicamento = Medicamento::findOrfail($id);

        $medicamento->nombre_medicamento = $request->input("nombre_medicamento");
        $medicamento->compuestos = $request->input("compuestos");
        $medicamento->descripcion = $request->input("descripcion");
        $creado = $medicamento->save();
        return redirect()->route('medicamento.edit', ['id'=>$medicamento->id])
            ->with('mensaje', "Medicamento {$medicamento->nombre}  actualizado correctamente");


    }

    public function buscar(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
