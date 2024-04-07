<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFichafamiliar;
use Illuminate\Http\Request;
use App\Models\Hoja;
use App\Models\Hogare;
use App\Models\Miembro;
use App\Models\Mortalidade;
use App\Models\Riesgo;
use Illuminate\Support\Facades\DB;


class fichaFamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $fichasFamiliares = Hoja::paginate(10);
            return view('Fichafamiliar.fichafamiliarLista')->with('fichasFamiliares', $fichasFamiliares);

            $miembros = Miembro::all(); // Consulta todos los miembros en la base de datos
            return view('fichafamiliar', compact('miembros')); // Devuelve la vista 'fichafamiliar' y pasa la variable $miembros a la vista
    }

    public function pdf(string $id)
    {
        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        // Cargar PDF con todas las páginas y datos necesarios
        $pdf = app('dompdf.wrapper')->loadView('Fichafamiliar.fichaPdf', [
            'datos' => $datos,
        ])->setPaper('legal', 'landscape');

        // Stream del PDF
        return $pdf->stream();
    }



    /**
     * Creadores de los formularios de ficha familiar
     */
    public function create()
    {
        return view('Fichafamiliar.fichafamiliar');
    }

    public function create2()
    {
        return view('Fichafamiliar.formulario2');
    }

    public function create3()
    {
        return view('Fichafamiliar.formulario3');
    }
    public function create4()
    {
        return view('Fichafamiliar.formulario4');
    }
    public function create5()
    {
        return view('Fichafamiliar.formulario5');
    }




    /**
     * Store a newly created resource in storage.
     */

     public function showAndStore(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validar y almacenar los datos del formulario
            // Puedes tener lógica para distinguir qué formulario se envió aquí
            // Lógica para guardar los datos y manejar las redirecciones
        } else {
            // Lógica para mostrar la vista con los formularios en los modales
            return view('tu_vista_con_modales');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
        //Validaciones de Datos Generales
        'codigo' => 'required|alpha_num|max:3',
        'nombre_del_entrevistador' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
        'segundo_apellido'=>'nullable|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚ]+$/u|max:10',
        'fecha_de_entrevista' => 'required|date|date_format:Y-m-d|before_or_equal:'.now()->format('Y-m-d'),
        'region_sanitaria'=>'required|alpha_num|max:999',  //'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u|between:10,200',
        'establecimiento_de_salud_sede_del_equipo'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,150',
        'sector'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,50',
        'numero_de_identidad_del_jefe_de_la_casa'=>'required|numeric|digits:13|numero_de_identidad_del_jefe_de_la_casa_fichafam1',
        //'número_de_identidad_del_jefe_de_la_casa'=>'unique|required|numeric|digits:13|regex:/^0[^E][0-9]$/|número_de_identidad_del_jefe_de_la_casa_fichafam1',
        'numero_de_celular_o_fijo'=>'required|regex:/^[2389][0-9]{7}$/|size:8',
        'numero_de_celular_o_fijo'=>'required|regex:/^[2389][0-9]{7}$/|size:8',
        'nombre_completo_del_jefe_de_la_familia' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
        'estado_civil' => 'required|in:Soltero,Casado,Union Libre',
        'numero_de_vivienda'=>'required|alpha_num|max:999',
        'Aldea_Caserio_Barrio_Colonia'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
        'referencia_vecinal'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,100',
        'area' => 'required|in:Urbana,Rural',
        'municipio'=>'required|alpha_num|max:25',
        'distancia_en_kilometros'=>'required|alpha_num|max:3',
        'horas'=>'required|alpha_num|max:3',
        'minutos' => 'required|regex:/^[0-6]?[0-9]$/', //'minutos'=>'required|alpha_num|max:60',
        'nombre_del_establecimiento_mas_cercano'=>'string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
        'codigo'=>'required|alpha_num|max:4',
    ]);
    //Datos Generales
    $fichafamiliar = new Hoja();
    $fichafamiliar->codigo = $request->input("codigo");
    $fichafamiliar->nombre_del_entrevistador = $request->input("nombre_del_entrevistador");
    $fichafamiliar->fecha_de_entrevista = $request->input("fecha_de_entrevista");
    $fichafamiliar->region_sanitaria = $request->input("region_sanitaria");
    $fichafamiliar->region_sanitaria = $request->input("region_sanitaria");
    $fichafamiliar->establecimiento_de_salud_sede_del_equipo = $request->input("establecimiento_de_salud_sede_del_equipo");
    $fichafamiliar->sector = $request->input("sector");
    $fichafamiliar->codigo = $request->input("codigo");
    $fichafamiliar->numero_de_identidad_del_jefe_de_la_casa = $request->input("numero_de_identidad_del_jefe_de_la_casa");
    $fichafamiliar->numero_de_celular_o_fijo = $request->input("numero_de_celular_o_fijo");
    $fichafamiliar->numero_de_identidad_del_jefe_de_la_casa = $request->input("numero_de_identidad_del_jefe_de_la_casa");
    $fichafamiliar->numero_de_celular_o_fijo = $request->input("numero_de_celular_o_fijo");
    $fichafamiliar->nombre_completo_del_jefe_de_la_familia = $request->input("nombre_completo_del_jefe_de_la_familia");
    $fichafamiliar->estado_civil = $request->input("estado_civil");
    $fichafamiliar->numero_de_vivienda = $request->input("numero_de_vivienda");
    $fichafamiliar->Aldea_Caserio_Barrio_Colonia = $request->input("Aldea_Caserio_Barrio_Colonia");
    $fichafamiliar->referencia_vecinal = $request->input("referencia_vecinal");
    $fichafamiliar->area = $request->input("area");
    $fichafamiliar->municipio = $request->input("municipio");
    $fichafamiliar->distancia_en_kilometros = $request->input("distancia_en_kilometros");
    $fichafamiliar->horas = $request->input("horas");
    $fichafamiliar->minutos = $request->input("minutos");
    $fichafamiliar->nombre_del_establecimiento_mas_cercano = $request->input("nombre_del_establecimiento_mas_cercano");

    $creado = $fichafamiliar->save();

        if ($creado) {
            return redirect()->route('fichafamiliar2.create2');
                //->with('mensaje', "Ficha familiar" . $fichafamiliar->nombre . " creada correctamente");
        }


}

public function store2(Request $request)
    {
    $request->validate([
        'techo_con_materiales_de_desecho' => 'required|in:si,no',
        'paredes_con_meteriales_de_desechos' => 'required|in:si,no',
        'piso_de_tierra' => 'required|in:si,no',
        'fogon_sin_chimenea_dentro_de_la_vivienda' => 'required|in:si,no',
        'criaderos_de_vectores' => 'required|in:si,no',
        'animales_dentro_de_la_vivienda' => 'required|in:si,no',
        'abastecimiento_de_agua' => 'required|in:Pozo_publico,Pozo_domicilio,Carro_cisterna,Corrientes_superficiales,Llave_publica,Conexion_o_llave_en_domicilio',
        'agua_para_consumo' => 'required|in:No_tratado,Botellon(agua purificada),Filtrado,Hervida,Clorada',
        'eliminacion_de_excretas' => 'required|in:Letrina_de_foso_simple,Inododo_o_servicio_sanitario,Letrina_de_cierre_hidraulico,Aire_libre',
        'eliminacion_de_basura' => 'required|in:Tren_de_aseo,La_entierra,Quema_de_basura,Aire_libre',
        'energia_electrica' => 'required|in:si,no',
        'hacinamiento' => 'required|in:si,no',
        'beneficiarios' => 'required|in:si,no',
        'observaciones1' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',

    ]);

    // Informacion de Hogar
        $fichafamiliar2 = new Hogare();
        $fichafamiliar2->techo_con_materiales_de_desecho = $request->input("techo_con_materiales_de_desecho");
        $fichafamiliar2->paredes_con_meteriales_de_desechos = $request->input("paredes_con_meteriales_de_desechos");
        $fichafamiliar2->piso_de_tierra = $request->input("piso_de_tierra");
        $fichafamiliar2->fogon_sin_chimenea_dentro_de_la_vivienda = $request->input("fogon_sin_chimenea_dentro_de_la_vivienda");
        $fichafamiliar2->criaderos_de_vectores = $request->input("criaderos_de_vectores");
        $fichafamiliar2->animales_dentro_de_la_vivienda = $request->input("animales_dentro_de_la_vivienda");
        $fichafamiliar2->abastecimiento_de_agua = $request->input("abastecimiento_de_agua");
        $fichafamiliar2->agua_para_consumo = $request->input("agua_para_consumo");
        $fichafamiliar2->eliminacion_de_excretas = $request->input("eliminacion_de_excretas");
        $fichafamiliar2->eliminacion_de_basura = $request->input("eliminacion_de_basura");
        $fichafamiliar2->energia_electrica = $request->input("energia_electrica");
        $fichafamiliar2->hacinamiento = $request->input("hacinamiento");
        $fichafamiliar2->beneficiarios = $request->input("beneficiarios");
        $fichafamiliar2->observaciones1 = $request->input("observaciones1");
        $fichafamiliar2->hoja_id = DB::table('hojas')->latest()->value('id');


    $creado = $fichafamiliar2->save();

        if ($creado) {
            return redirect()->route('fichafamiliar3.create3');
                //->with('mensaje', "Ficha familiar" . $fichafamiliar->nombre . " creada correctamente");
        }


}

public function store3(Request $request)
    {
    $request->validate([
        'nombres_y_apellidos' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,50',
        'No_identidad'=>'required|numeric|digits:13|No_identidad_fichafam3',
        'sexo'=>'required|in:M,F',
        'parentesco' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,20',
        'fecha_de_nacimiento'=>'required|date|after_or_equal:1909-01-01',
        'edad'=>'required|alpha_num|max:110',
        'etnia'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
        'escolaridad'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
        'trabaja_actualmente' => 'required|in:si,no',
        'ocupacion'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
        'vacuna_completa' => 'required|in:si,no',
        'riesgos'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,60',
        'GR'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,60',
        'PF'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
        'tratamiento_para_enf_cronica' => 'required|in:si,no',
        'nombre_del_medicamento_para_enfermedad_cronica' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,150',
        'observaciones2' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
        'No_dependientes'=>'required|alpha_num|max:3',
    ]);

    $fichafamiliar3 = new Miembro();
    $fichafamiliar3->nombres_y_apellidos = $request->input("nombres_y_apellidos");
    $fichafamiliar3->No_identidad = $request->input("No_identidad");
    $fichafamiliar3->sexo = $request->input("sexo");
    $fichafamiliar3->parentesco = $request->input("parentesco");
    $fichafamiliar3->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
    $fichafamiliar3->edad = $request->input("edad");
    $fichafamiliar3->etnia = $request->input("etnia");
    $fichafamiliar3->escolaridad = $request->input("escolaridad");
    $fichafamiliar3->trabaja_actualmente = $request->input("trabaja_actualmente");
    $fichafamiliar3->ocupacion = $request->input("ocupacion");
    $fichafamiliar3->vacuna_completa = $request->input("vacuna_completa");
    $fichafamiliar3->riesgos = $request->input("riesgos");
    $fichafamiliar3->GR = $request->input("GR");
    $fichafamiliar3->PF = $request->input("PF");
    $fichafamiliar3->tratamiento_para_enf_cronica = $request->input("tratamiento_para_enf_cronica");
    $fichafamiliar3->nombre_del_medicamento_para_enfermedad_cronica = $request->input("nombre_del_medicamento_para_enfermedad_cronica");
    $fichafamiliar3->observaciones2 = $request->input("observaciones2");
    $fichafamiliar3->No_dependientes = $request->input("No_dependientes");
    $fichafamiliar3->observaciones3 = 'Obervacion vacia';
    $fichafamiliar3->No = 123;
    $fichafamiliar3->hoja_id = DB::table('hojas')->latest()->value('id');



    $creado = $fichafamiliar3->save();

        if ($creado) {
            return redirect()->route('fichafamiliar4.create4');
                //->with('mensaje', "Ficha familiar" . $fichafamiliar->nombre . " creada correctamente");
        }


}

public function store4(Request $request)
    {
        $request->validate([
        'no_mortalidad'=>'nullable|alpha_num|max:500',
        'nombre_y_apellido' => 'nullable|regex:/^[\pL\s\-\'\.\']+$/u|between:3,100',
        'edad_mortalidad'=>'nullable|alpha_num|max:115',
        'causa' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
        'observaciones4' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
], [
    'no_mortalidad.required_if' => 'El  no mortalidad es obligatorio si se llenan otros espacio del formulario.',
    'nombre_y_apellido.required_if' => 'El nombre y apellido es obligatorio si se llenan otros espacio del formulario.',
    'edad_mortalidad.required_if' => 'La edad de mortalidad es obligatorio si se llenan otros espacio del formulario.',
    'causa.required_if' => 'La causa es obligatorio si se llenan otros espacio del formulario.',
    'observaciones4.required_if' => 'Las  observaciones son obligatorio si se llenan otros espacio del formulario.',
]);

        // Informacion de mortalidad
   $fichafamiliar4 = new Mortalidade();
   $fichafamiliar4->no_mortalidad = $request->input("no_mortalidad");
   $fichafamiliar4->nombre_y_apellido = $request->input("nombre_y_apellido");
   $fichafamiliar4->edad_mortalidad = $request->input("edad_mortalidad");
   $fichafamiliar4->causa = $request->input("causa");
   $fichafamiliar4->observaciones4 = $request->input("observaciones4");
   $fichafamiliar4->hoja_id = DB::table('hojas')->latest()->value('id');



    $creado = $fichafamiliar4->save();

        if ($creado) {
            return redirect()->route('fichafamiliar5.create5');
                //->with('mensaje', "Ficha familiar" . $fichafamiliar->nombre . " creada correctamente");
        }

}
public function store5(Request $request)
    {
    $request->validate([
        'evaluacion_del_riesgo_familiar' => 'required|in:Grupo_I_de_riesgo,Grupo_II_de_riesgo,Grupo_III_de_riesgo,Grupo_IV_de_riesgo',
        'higienicos_sanitarios' => 'required|in:Con_dos_o_mas_condiciones_inadecuadas,Con_una_condicion_inadecuada,Con_tres_condiciones_inadecuadas,Esta_en_condicion_inadecuada',
        'socio_economico' => 'required|in:La_vivienda_tiene_caracteristicas_fisicas_inadecuadas,La_vivienda_tiene_servicios_inadecuados,El_hogar_se_encuentra_en_estado_de_hacinamiento_critico,En_el_hogar_existen_niños_que_no_asisten_a_la_escuela',
        'el_hogar_tiene_una_alta_dependencia_economica' => 'required|in:Hogar_pobre,Vivienda_tiene_servicios_inadecuados,Ninguno',
        'observaciones5' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',


    ]);


    $fichafamiliar5 = new Riesgo();
    $fichafamiliar5->evaluacion_del_riesgo_familiar = $request->input("evaluacion_del_riesgo_familiar");
     $fichafamiliar5->higienicos_sanitarios = $request->input("higienicos_sanitarios");
     $fichafamiliar5->socio_economico = $request->input("socio_economico");
     $fichafamiliar5->hogar = $request->input("el_hogar_tiene_una_alta_dependencia_economica");
     $fichafamiliar5->hoja_id = DB::table('hojas')->latest()->value('id');
     $fichafamiliar5->observaciones5 = $request->input("observaciones5");



    $creado = $fichafamiliar5->save();

        if ($creado) {
            return redirect()->route('fichaformulario.index')
                ->with('mensaje', "Ficha familiar" . $fichafamiliar5->nombre . " creada correctamente");
        }


}

public function eliminar($id){
    $fichaFamiliar = DB::table('hojas')->where('id', $id)->first();
    $hogar = DB::table('hogares')->where('hoja_id', $id)->first();
    $miembro = DB::table('miembros')->where('hoja_id', $id)->first();
    $mortalidad = DB::table('mortalidades')->where('hoja_id', $id)->first();
    $riesgo = DB::table('riesgos')->where('hoja_id', $id)->first();

    if($fichaFamiliar){
        DB::table('hojas')->where('id', $id)->delete();
    }

    if($hogar){
        DB::table('hogares')->where('hoja_id', $id)->delete();
    }

    if($miembro){
        DB::table('miembros')->where('hoja_id', $id)->delete();
    }

    if($mortalidad){
        DB::table('mortalidades')->where('hoja_id', $id)->delete();
    }

    if($riesgo){
        DB::table('riesgos')->where('hoja_id', $id)->delete();
    }

    return redirect()->route('fichaformulario.ver')
    ->with('mensaje', "Has cancelado tu formulario de ficha familiar");;
}
public function show(string $id)
    {
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        $fichasFamiliares = Hoja::findOrFail($id);

        return view("Fichafamiliar.fichafamiliarIndividual", compact('fichasFamiliares', 'datos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->where('h.id', $id)
            ->select('h.*')
            ->first();

        return view("Fichafamiliar.fichaEditar", ['id' => $id, 'datos' => $datos]);

    }

    public function editar2(string $id)
    {

        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        return view("Fichafamiliar.fichaEditar2", ['id' => $id, 'datos' => $datos]);

    }

    public function editar3(string $id)
    {
        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        return view("Fichafamiliar.fichaEditar3", ['id' => $id, 'datos' => $datos]);

    }

    public function editar4(string $id)
    {
        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        return view("Fichafamiliar.fichaEditar4", ['id' => $id, 'datos' => $datos]);

    }

    public function editar5(string $id)
    {
        // Realizar la consulta SQL para obtener todos los datos relacionados
        $datos = DB::table('hojas as h')
            ->leftJoin('hogares as ho', 'h.id', '=', 'ho.hoja_id')
            ->leftJoin('miembros as m', 'h.id', '=', 'm.hoja_id')
            ->leftJoin('mortalidades as mo', 'h.id', '=', 'mo.hoja_id')
            ->leftJoin('riesgos as r', 'h.id', '=', 'r.hoja_id')
            ->where('h.id', $id)
            ->select('h.*', 'ho.*', 'm.*', 'mo.*', 'r.*')
            ->first();

        return view("Fichafamiliar.fichaEditar5", ['id' => $id, 'datos' => $datos]);

    }

    /**
     * Update the specified resource in storage.
     */
    // Controlador
    public function update(Request $request, $id)
    {
        // Buscar la hoja familiar por su ID

        //dd($request);
        $hoja = Hoja::findOrFail($id);

        // Validar los datos del formulario
         $request->validate([
            'nombre_del_entrevistador' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
            'fecha_de_entrevista' => 'required|date|date_format:Y-m-d|before_or_equal:' . now()->format('Y-m-d'),
            'region_sanitaria' => 'required|alpha_num|max:999',
            'establecimiento_de_salud_sede_del_equipo' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,150',
            'sector' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,50',
            'numero_de_identidad_del_jefe_de_la_casa' => 'required|numeric|digits:13|numero_de_identidad_del_jefe_de_la_casa_fichafam1',
            'numero_de_celular_o_fijo' => 'required|regex:/^[2389][0-9]{7}$/|size:8',
            'nombre_completo_del_jefe_de_la_familia' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
            'numero_de_vivienda' => 'required|alpha_num|max:999',
            'Aldea_Caserio_Barrio_Colonia' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
            'referencia_vecinal' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,100',
            'municipio' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|max:25',
            'distancia_en_kilometros' => 'required|alpha_num|max:3',
            'minutos' => 'required|regex:/^[0-6]?[0-9]$/',
            'nombre_del_establecimiento_mas_cercano' => 'string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
            'codigo' => 'required|alpha_num|max:4',
        ]);

        $hoja->nombre_del_entrevistador = $request['nombre_del_entrevistador'];
        $hoja->fecha_de_entrevista = $request['fecha_de_entrevista'];
        $hoja->region_sanitaria = $request['region_sanitaria'];
        $hoja->establecimiento_de_salud_sede_del_equipo = $request['establecimiento_de_salud_sede_del_equipo'];
        $hoja->sector = $request['sector'];
        $hoja->numero_de_identidad_del_jefe_de_la_casa = $request['numero_de_identidad_del_jefe_de_la_casa'];
        $hoja->numero_de_celular_o_fijo = $request['numero_de_celular_o_fijo'];
        $hoja->nombre_completo_del_jefe_de_la_familia = $request['nombre_completo_del_jefe_de_la_familia'];
        $hoja->numero_de_vivienda = $request['numero_de_vivienda'];
        $hoja->Aldea_Caserio_Barrio_Colonia = $request['Aldea_Caserio_Barrio_Colonia'];
        $hoja->referencia_vecinal = $request['referencia_vecinal'];
        $hoja->municipio = $request['municipio'];
        $hoja->distancia_en_kilometros = $request['distancia_en_kilometros'];
        $hoja->minutos = $request['minutos'];
        $hoja->nombre_del_establecimiento_mas_cercano = $request['nombre_del_establecimiento_mas_cercano'];
        $hoja->codigo = $request['codigo'];

        if ($hoja->save()){
            $mensaje = "Los datos generales se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos generales no se editaro nexitosamente";
        }

        return redirect()->route('fichafamiliar.edit2', ['id' => $id])
            ->with('hoja', $hoja)
            ->with('mensaje', $mensaje);
    }
    public function update2(Request $request, $id)
    {
        // Obtener el registro existente que se actualizará
        $hogar = Hogare::findOrFail($id);

        // Obtener el hoja_id correspondiente al registro actual
        $hojaId = $hogar->hoja_id;

        $hogar->techo_con_materiales_de_desecho = $request->input("techo_con_materiales_de_desecho");
        $hogar->paredes_con_meteriales_de_desechos = $request->input("paredes_con_meteriales_de_desechos");
        $hogar->piso_de_tierra = $request->input("piso_de_tierra");
        $hogar->fogon_sin_chimenea_dentro_de_la_vivienda = $request->input("fogon_sin_chimenea_dentro_de_la_vivienda");
        $hogar->criaderos_de_vectores = $request->input("criaderos_de_vectores");
        $hogar->animales_dentro_de_la_vivienda = $request->input("animales_dentro_de_la_vivienda");
        $hogar->abastecimiento_de_agua = $request->input("abastecimiento_de_agua");
        $hogar->agua_para_consumo = $request->input("agua_para_consumo");
        $hogar->eliminacion_de_excretas = $request->input("eliminacion_de_excretas");
        $hogar->eliminacion_de_basura = $request->input("eliminacion_de_basura");
        $hogar->energia_electrica = $request->input("energia_electrica");
        $hogar->hacinamiento = $request->input("hacinamiento");
        $hogar->beneficiarios = $request->input("beneficiarios");
        $hogar->observaciones1 = $request->input("observaciones1");
        $hogar->hoja_id = $hojaId;

        //dd($hogar);
        //dump($hogar);

        if ($hogar->save()){
            $mensaje = "Los datos del Hogar se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos del Hogar no se editaron exitosamente";
        }

        return redirect()->route('fichafamiliar.edit3', ['id' => $id])
            ->with('hoja', $hogar)
            ->with('mensaje', $mensaje);

    }

    public function update3(Request $request, $id)
    {
        // Obtener el registro existente que se actualizará
        $miembro = Miembro::findOrFail($id);

        // Obtener el hoja_id correspondiente al registro actual
        $hojaId = $miembro->hoja_id;

        $request->validate([
            'nombres_y_apellidos' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,50',
            'No_identidad'=>'required|numeric|digits:13|No_identidad_fichafam3',
            'sexo'=>'required|in:M,F',
            'parentesco' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,20',
            'fecha_de_nacimiento'=>'required|date|after_or_equal:1909-01-01',
            'edad'=>'required|alpha_num|max:110',
            'etnia'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
            'escolaridad'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
            'trabaja_actualmente' => 'required|in:si,no',
            'ocupacion'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
            'vacuna_completa' => 'required|in:si,no',
            'riesgos'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,60',
            'GR'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,60',
            'PF'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,25',
            'tratamiento_para_enf_cronica' => 'required|in:si,no',
            'nombre_del_medicamento_para_enfermedad_cronica' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,150',
            'observaciones2' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            'No_dependientes'=>'required|alpha_num|max:3',
        ]);

        $miembro->nombres_y_apellidos = $request->input("nombres_y_apellidos");
        $miembro->No_identidad = $request->input("No_identidad");
        $miembro->sexo = $request->input("sexo");
        $miembro->parentesco = $request->input("parentesco");
        $miembro->fecha_de_nacimiento = $request->input("fecha_de_nacimiento");
        $miembro->edad = $request->input("edad");
        $miembro->etnia = $request->input("etnia");
        $miembro->escolaridad = $request->input("escolaridad");
        $miembro->trabaja_actualmente = $request->input("trabaja_actualmente");
        $miembro->ocupacion = $request->input("ocupacion");
        $miembro->vacuna_completa = $request->input("vacuna_completa");
        $miembro->riesgos = $request->input("riesgos");
        $miembro->GR = $request->input("GR");
        $miembro->PF = $request->input("PF");
        $miembro->tratamiento_para_enf_cronica = $request->input("tratamiento_para_enf_cronica");
        $miembro->nombre_del_medicamento_para_enfermedad_cronica = $request->input("nombre_del_medicamento_para_enfermedad_cronica");
        $miembro->observaciones2 = $request->input("observaciones2");
        $miembro->No_dependientes = $request->input("No_dependientes");
        $miembro->observaciones3 = 'Obervacion vacia';
        $miembro->No = 123;
        $miembro->hoja_id = $hojaId;

        if ($miembro->save()){
            $mensaje = "Los datos del Miembro se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos del Miembro no se editaronexitosamente";
        }

        return redirect()->route('fichafamiliar.edit4', ['id' => $id])
            ->with('hoja', $miembro)
            ->with('mensaje', $mensaje);
    }
    public function update4(Request $request, $id)
    {
        // Obtener el registro existente que se actualizará
        $mortalidad = Miembro::findOrFail($id);

        // Obtener el hoja_id correspondiente al registro actual
        $hojaId = $mortalidad->hoja_id;

        $request->validate([
            'no_mortalidad'=>'nullable|alpha_num|max:500',
            'nombre_y_apellido' => 'nullable|regex:/^[\pL\s\-\'\.\']+$/u|between:3,100',
            'edad_mortalidad'=>'nullable|alpha_num|max:115',
            'causa' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            'observaciones4' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
        ], [
            'no_mortalidad.required_if' => 'El  no mortalidad es obligatorio si se llenan otros espacio del formulario.',
            'nombre_y_apellido.required_if' => 'El nombre y apellido es obligatorio si se llenan otros espacio del formulario.',
            'edad_mortalidad.required_if' => 'La edad de mortalidad es obligatorio si se llenan otros espacio del formulario.',
            'causa.required_if' => 'La causa es obligatorio si se llenan otros espacio del formulario.',
            'observaciones4.required_if' => 'Las  observaciones son obligatorio si se llenan otros espacio del formulario.',
        ]);

        // Informacion de mortalidad
        $mortalidad = new Mortalidade();
        $mortalidad->no_mortalidad = $request->input("no_mortalidad");
        $mortalidad->nombre_y_apellido = $request->input("nombre_y_apellido");
        $mortalidad->edad_mortalidad = $request->input("edad_mortalidad");
        $mortalidad->causa = $request->input("causa");
        $mortalidad->observaciones4 = $request->input("observaciones4");
        $mortalidad->hoja_id = $hojaId;

        if ($mortalidad->save()){
            $mensaje = "Los datos de Mortalidad se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos de Mortalidad no se editaronexitosamente";
        }

        return redirect()->route('fichafamiliar.edit4', ['id' => $id])
            ->with('hoja', $mortalidad)
            ->with('mensaje', $mensaje);

    }

    public function update5(Request $request, $id)
    {
        // Obtener el registro existente que se actualizará
        $riesgo = Miembro::findOrFail($id);

        // Obtener el hoja_id correspondiente al registro actual
        $hojaId = $riesgo->hoja_id;


            $request->validate([
                'evaluacion_del_riesgo_familiar' => 'required|in:Grupo_I_de_riesgo,Grupo_II_de_riesgo,Grupo_III_de_riesgo,Grupo_IV_de_riesgo',
                'higienicos_sanitarios' => 'required|in:Con_dos_o_mas_condiciones_inadecuadas,Con_una_condicion_inadecuada,Con_tres_condiciones_inadecuadas,Esta_en_condicion_inadecuada',
                'socio_economico' => 'required|in:La_vivienda_tiene_caracteristicas_fisicas_inadecuadas,La_vivienda_tiene_servicios_inadecuados,El_hogar_se_encuentra_en_estado_de_hacinamiento_critico,En_el_hogar_existen_niños_que_no_asisten_a_la_escuela',
                'el_hogar_tiene_una_alta_dependencia_economica' => 'required|in:Hogar_pobre,Vivienda_tiene_servicios_inadecuados,Ninguno',
                'observaciones5' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            ]);

            $riesgo->evaluacion_del_riesgo_familiar = $request->input("evaluacion_del_riesgo_familiar");
            $riesgo->higienicos_sanitarios = $request->input("higienicos_sanitarios");
            $riesgo->socio_economico = $request->input("socio_economico");
            $riesgo->hogar = $request->input("el_hogar_tiene_una_alta_dependencia_economica");
            $riesgo->hoja_id = $hojaId;
            $riesgo->observaciones5 = $request->input("observaciones5");

        if ($riesgo->save()){
            $mensaje = "Los datos de Mortalidad se editaron exitosamente";
        }
        else{
            $mensaje = "Los datos de Mortalidad no se editaronexitosamente";
        }

        return redirect()->route('fichafamiliar.edit4', ['id' => $id])
            ->with('hoja', $riesgo)
            ->with('mensaje', $mensaje);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //public function mostrarMiembros()
    //{
      //  $miembros = Miembro::all();
       // return view('fichafamiliar')->with('miembros', $miembros);
    //}

    public function mostrarMiembros()
    {
        // Obtener todos los miembros
        $miembros = Miembro::all();

        // Pasar la variable $miembros a la vista
        return view('FichaFamiliar.fichafamiliar', compact('miembros'));
    }

    public function ver()
    {
        $fichasFamiliares = Hoja::paginate(10);
        return view('Fichafamiliar.fichafamiliarLista', ['fichasFamiliares' => $fichasFamiliares]);
    }


    public function buscar(Request $request)
    {
        $texto = $request->query('texto');

        $fichasFamiliares = Hoja::where('nombre_completo_del_jefe_de_la_familia', 'LIKE', '%' . $texto . '%')
            ->orWhere('numero_de_identidad_del_jefe_de_la_casa', 'LIKE', '%' . $texto . '%')
            ->orWhere('codigo', 'LIKE', '%' . $texto . '%')
            ->paginate(10);

        return view('Fichafamiliar.fichafamiliarLista', ['fichasFamiliares' => $fichasFamiliares]);
    }

}
