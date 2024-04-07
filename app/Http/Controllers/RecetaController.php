<?php

namespace App\Http\Controllers;
use App\Models\Receta;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index( Request $request)
    {
      
        $busqueda = $request -> busqueda;

        $recetas = Receta::where('nombres', 'LIKE', '%'.$busqueda.'%');
           

        $data =[
            'recetas'=>$recetas,
            'busqueda'=>$busqueda,
        ];

        $recetas = Receta::paginate(25);
        return view('Recetas.RecetaCreate',$data,compact('recetas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
 
        return view("Recetas.recetaCreate");

    }
    public function store(Request $request)
    {
      

        $creado = $receta->save();

        if ($creado) {
            
            return redirect()->route('receta.index')
                ->with('mensaje', "Receta" . $receta->nombre . " creado correctamente");
        
            }         
          }
         public function buscar(Request $request)
        {
           $texto = $request->query('texto');

            $recetas = Receta::where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('fecha', 'LIKE', '%' . $texto . '%')
              ->paginate(10);

            return view('Recetas.receta', ['recetas' => $recetas]);
            }
          public function ver()
            {
            $recetas = Receta::paginate(10);
             return view('Recetas.receta', ['recetas' => $recetas]);
           }
            public function show($id)
           {
            $recetas = Receta::where('id', $id)->first();

    return view('Recetas.recetaIndividual', compact('recetas'));

    
    }
}

