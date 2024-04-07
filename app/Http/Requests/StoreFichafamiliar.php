<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreFichafamiliar extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            //Validaciones de Datos Generales
            'codigo' => 'required|alpha_num|max:3',
            'nombre_del_entrevistador' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
            'segundo_apellido'=>'nullable|alpha|regex:/^[A-Za-záéíóúÁÉÍÓÚ]+$/u|max:10',
            'fecha_de_entrevista' => 'required|date|date_format:Y-m-d|before_or_equal:'.now()->format('Y-m-d'),
            'region_sanitaria'=>'required|alpha_num|max:999',  //'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u|between:10,200',
            'establecimiento_de_salud_sede_del_equipo'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,150',
            'sector'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,50',
            'numero_de_identidad_del_jefe_de_la_casa'=>'required|numeric|digits:13|número_de_identidad_del_jefe_de_la_casa_fichafam1',
            'numero_de_celular_o_fijo'=>'required|regex:/^[2389][0-9]{7}$/|size:8',
            'nombre_completo_del_jefe_de_la_familia' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚ\s]+(?!\s\s)$/u|between:3,80',
            'numero_de_vivienda'=>'required|alpha_num|max:999',
            'Aldea_Caserio_Barrio_Colonia'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
            'referencia_vecinal'=>'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:2,100',
            'municipio'=>'required|alpha_num|max:25',
            'distancia_en_kilometros'=>'required|alpha_num|max:3',
            'minutos' => 'required|regex:/^[0-6]?[0-9]$/', //'minutos'=>'required|alpha_num|max:60',
            'nombre_del_establecimiento_mas_cercano'=>'string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,80',
            'codigo'=>'required|alpha_num|max:4',
            ///hogar////
            'techo_con_materiales_de_desecho' => 'required|in:si,no',
            'paredes_con_meteriales_de_desechos' => 'required|in:si,no',
            'piso_de_tierra' => 'required|in:si,no',
            'fogon_sin_chimenea_dentro_de_la_vivienda' => 'required|in:si,no',
            'criaderos_de_vectores' => 'required|in:si,no',
            'animales_dentro_de_la_vivienda' => 'required|in:si,no',
            'abastecimiento_de_agua' => 'required|in:Pozo_publico,Pozo_domicilio,Carro_cisterna,Corrientes_superficiales,Llave_pública,Conexión_o_llave_en_domicilio',
            'agua_para_consumo' => 'required|in:No_tratado,Botellón(agua purificada),Filtrado,Hervida,Hervida',
            'eliminacion_de_excretas' => 'required|in:Letrina_de_foso_simple,Inododo_o_servicio_sanitario,Letrina_de_cierre_hidráulico,Aire_libre',
            'eliminacion_de_basura' => 'required|in:Tren_de_aseo,La_entierra,Quema_de_basura,Aire_libre',
            'energia_electrica' => 'required|in:si,no',
            'hacinamiento' => 'required|in:si,no',
            'beneficiarios' => 'required|in:si,no',
            'observaciones1' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            ////miembros///
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
            'observaciones3' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            ////mortalidad///
            'no_mortalidad'=>'nullable|alpha_num|max:500',
            'nombre_y_apellido' => 'nullable|regex:/^[\pL\s\-\'\.\']+$/u|between:3,100',
            'edad_mortalidad'=>'nullable|alpha_num|max:115',
            'causa' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            'observaciones4' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',
            /////Riesgos///
            'evaluacion_del_riesgo_familiar' => 'required|in:Grupo_I_de_riesgo,Grupo_II_de_riesgo,Grupo_III_de_riesgo,Grupo_IV_de_riesgo',
            'higienicos_sanitarios' => 'required|in:Con_dos_o_más_condiciones_inadecuadas,Con_una_condición_inadecuada,Con_tres_condiciones_inadecuadas,Esta_en_condición_inadecuada',
            'socio_economico' => 'required|in:La_vivienda_tiene_características_físicas_inadecuadas,La_vivienda_tiene_servicios_inadecuados,El_hogar_se_encuentra_en_estado_de_hacinamiento_crítico,En_el_hogar_existen_niños_que_no_asisten_a_la_escuela',
            'el_hogar_tiene_una_alta_dependencia_economica' => 'required|in:Hogar_pobre,Vivienda_tiene_servicios_inadecuados,Ninguno',
            'observaciones5' =>'nullable|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s\d\W]+$/u|between:3,200',


        ];
    }

    public function messages()
    {
        return [
            'nombre_del_entrevistador.required' => 'Debe ingresar el nombre del entrevistador.',
            'nombre_del_entrevistador.regex' => 'El nombre del entrevistador solo puede contener letras',
            'numero_de_identidad_del_jefe_de_la_casa.fichafam1' => 'No válido.',
        ];
    }

}
