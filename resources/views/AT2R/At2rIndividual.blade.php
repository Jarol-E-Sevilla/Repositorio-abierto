@extends('Plantillas.Plantilla')

@section('titulo', 'AT2R')

@section('contenido')
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Conceptos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            font-family: Arial;
        }

        .iz{
            text-align: left;
            border-collapse: collapse;
            border: 1px solid black;
        }
        th {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .sub {
            border-bottom: 2px solid black;
        }
    </style>
</head>
<body>

<h3 style="text-align: center">Secretaria de salud. Departamento de estadisticas</h3>
<h2 style="text-align: center">Informe Diario de Atencion Ambulatoria</h2>
<br>
<div>
    <label>Region sanitaria: </label>
    <label class="sub">#7, El Paraiso</label>
    <label STYLE="margin-left: 40px">Nivel: </label>
    <label class="sub">1</label>
    <label STYLE="margin-left: 40px">Establecimiento: </label>
    <label class="sub">CIS Jacaleapa</label>
    <label STYLE="margin-left: 40px; pointer-events: none;" for="fechaActual">Mes:</label>
    <span style="margin-left: 40px;">Mes:</span>
<input type="text" id="fechaActual" name="fechaActual" readonly style="border-bottom: 1px solid black; border-top: none; border-left: none; border-right: none;">

    <label STYLE="margin-left: 40px" for="anioActual">Año:</label>
    <span class="sub" id="anioActual" style="text-align: center"></span>

    <script>
        const fechaActual = new Date();
        const opciones = { month: 'long' }; // Especifica el formato del mes
        const formateador = new Intl.DateTimeFormat('es-ES', opciones); // Formato español
        const mesActual = formateador.format(fechaActual);
        const mesActualMayuscula = mesActual.charAt(0).toUpperCase() + mesActual.slice(1); // Convierte la primera letra a mayúscula

        document.getElementById('fechaActual').value = mesActualMayuscula;

        const anioActual = document.getElementById('anioActual');
        const anio = fechaActual.getFullYear(); // Obtiene el año completo

        anioActual.textContent = anio.toString(); // Inserta el año en el span
    </script>
</div>
<div>
    <label> Tipo de Profecional de la Salud:</label>
    <span>________________________</span>
    <label STYLE="margin-left: 35px"> Nombre:</label>
    <span>________________________</span>
    <label STYLE="margin-left: 35px"> Consulta Externa:</label>
    <span>________________________</span>
    <label STYLE="margin-left: 35px"> Emergencia:</label>
    <span>________________________</span>
</div>
<br>

<table id="mi-tabla">
    <thead>
    <tr>
        <th>Concepto</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th>13</th>
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        <th>26</th>
        <th>27</th>
        <th>28</th>
        <th>29</th>
        <th>30</th>
        <th>31</th>
    </tr>
    </thead>


    <tbody>
    <tr>
    <td class="iz">Menores de 1 mes de 1a vez</td>
    @forelse($datos as $at2r)
        <td style="border: 1px solid black;">0</td>
        @empty
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Menores de 1 mes subsiguiente</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->menores_1_sub }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    </tr>
    <tr>
        <td class="iz">1 Mes a 1 año de 1a vez</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->menores_1_sub }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">1 mes a 1 año subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">1 - 4 años 1a vez</td>
    </tr>
    <tr><td class="iz">1 - 4 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">5 - 9 años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">5 - 9 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">10 - 14 años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">10 -14 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">15 - 19 años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">15 - 19 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">20 - 49 años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">20 - 49 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">50 y + años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">50 - 59 años 1a vez</td>
    </tr>
    <tr>
        <td class="iz">50 - 59 años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">60 y + años subsiguiente</td>
    </tr>
    <tr>
        <td class="iz">Total de pacientes atendidos</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->total_pacientes_atendidos }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Atenciones de mujeres</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_atenciones_de_mujeres }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Atenciones de hombres</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_atenciones_de_hombres }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Consultas espontáneas</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_consultas_expontaneas }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Consultas referidas</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_consultas_referidas }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Controles puerperales</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->controles_puerperales }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Detección de sintomáticos respiratorios</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->sintomaticos_respiratorios }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Detección de cáncer cérvico uterino</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->cancer_cervicouterino }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Embarazadas nuevas</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->embarazadas_nuevas }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Embarazadas en control</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->embarazadas_en_control }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Controles puerperales</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->controles_puerperales_2 }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oal 1 ciclo</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->anticonceptivo_oral_1_ciclo }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oral 3 ciclos</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->anticonceptivo_oral_3_ciclo }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oral 6 ciclos</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->anticonceptivo_oral_6_ciclo }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Condones 10 unidades</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->condones_10_unidades }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Condones 30 unidades</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->condones_30_unidades }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Depo provera aplicadas</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->depo_provera_aplicadas }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">DIU insertados</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->diu_insertados }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Usuarias utilizando el método de días fijos (collar)</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_metodo_de_dias_fijos }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Implante subdérmico</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->implante_subdermico }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con diarrea</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_diarrea }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con diarrea que acuden a cita de seguimiento</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_diarrea_seguimiento }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con deshidratación rehidratados en la US</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->ninos_de_5_rehidratados }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con casos de neumonía nuevos en el año</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_neumonia_nuevos }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Seguimiento</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->seguimiento }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con algún grado de síndrome anémico</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_5_grado_anemico }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Diagnosticado por Laboratorio</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->diagnosticado_por_laboratorio }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Total de Niños/as menores de 5 años atendidos</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->total_menores_de_5_atendidos }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con crecimiento adecuado</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_crecimiento_adecuado }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con crecimiento inadecuado</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_crecimiento_inadecuado }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con bajo percentil 3</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_5_bajo_percentil_3 }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con daño nutricional severo</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_dano_nutricional_severo }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con discapacidad nuevos en el año</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_discapacidad_nuevos_en_el_anio }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con probable alteración del desarrollo</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->no_menores_de_5_con_probable_alteracion_del_desarrollo }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Atención prenatal nueva en las primeras 12 SG</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->atencion_prenatal_nueva_en_las_primeras_12_sg }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Atención puerperal nueva en los 10 primeros días</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->atencion_puerperal_nueva_en_los_10_primeros_dias }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Atención prenatal subsiguiente en las primeras 12 SG</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->atencion_prenatal_subsiguiente_en_las_primeras_12_sg }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Atención puerperal subsiguiente en los 10 primeros días</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->puerperal_sub_10_primeros_dias }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    <tr>
        <td class="iz">Atención puerperal subsiguiente en los 10 primeros días</td>
        @forelse($datos as $at2r)
        <td style="border: 1px solid black;">{{ $at2r->puerperal_nueva_primeros_dias }}</td>
        @empty
        <td style="border: 1px solid black;">0</td>
    
    @endforelse
    </tr>
    </tbody>
</table>






<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
<div style="text-align:right; margin: top 20px;">
    <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('at2r.buscar') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
        </svg> Volver</button>

</div>
<div> <br> <br> <br> </div>

</body>
</html>
@endsection
