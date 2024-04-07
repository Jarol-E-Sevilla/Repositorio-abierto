@extends('Plantillas.Plantilla')

@section('titulo', 'Creacion AT2R')

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
        <th style="width: 50%;">Concepto</th>
        <th style="width: 50%;">At2R: día {{ $at2rs->id }}</th>
        
    </tr>
    </thead>
    <tbody >
    <tr>
        <td class="iz">Menores de 1 mes de 1a vez</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->menores_1_1a }}</td>
    </tr>
    <tr>
        <td class="iz">Menores de 1 mes subsiguiente</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->menores_1_sub }}</td>
    </tr>
    <tr>
        <td class="iz">1 Mes a 1 año de 1a Vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">1 mes a 1 año subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">1 - 4 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr><td class="iz">1 - 4 años subsiguiente</td>
    <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">5 - 9 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">5 - 9 años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">10 - 14 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">10 -14 años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">15 - 19 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">15 - 19 años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">20 - 49 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">20 - 49 años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">50 y + años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">50 - 59 años 1a vez</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">50 - 59 años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">60 y + años subsiguiente</td>
        <td style="border: 1px solid black;"></td>
    </tr>
    <tr>
        <td class="iz">Total de pacientes atendidos</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->total_pacientes_atendidos }}</td>
    </tr>
    <tr>
        <td class="iz">No. Atenciones de mujeres</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_atenciones_de_mujeres }}</td>
    </tr>
    <tr>
        <td class="iz">No. Atenciones de hombres</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_atenciones_de_hombres }}</td>
    </tr>
    <tr>
        <td class="iz">No. Consultas espontáneas</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_consultas_expontaneas }}</td>
    </tr>
    <tr>
        <td class="iz">No. Consultas referidas</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_consultas_referidas }}</td>
    </tr>
    <tr>
        <td class="iz">Controles puerperales</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->controles_puerperales }}</td>
    </tr>
    <tr>
        <td class="iz">Detección de sintomáticos respiratorios</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->sintomaticos_respiratorios }}</td>
    </tr>
    <tr>
        <td class="iz">Detección de cáncer cérvico uterino</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{  $at2rs->cancer_cervicouterino }}</td>
    </tr>
    <tr>
        <td class="iz">Embarazadas nuevas</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->embarazadas_nuevas }}</td>
    </tr>
    <tr>
        <td class="iz">Embarazadas en control</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->embarazadas_en_control }}</td>
    </tr>
    <tr>
        <td class="iz">Controles Puerperales</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->controles_puerperales_2 }}</td>
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oral 1 ciclo</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->anticonceptivo_oral_1_ciclo }}</td>
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oral 3 ciclos</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->anticonceptivo_oral_3_ciclo }}</td>
    </tr>
    <tr>
        <td class="iz">Anticonceptivo oral 6 ciclos</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->anticonceptivo_oral_6_ciclo }}</td>
    </tr>
    <tr>
        <td class="iz">Condones 10 unidades</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->condones_10_unidades }}</td>
    </tr>
    <tr>
        <td class="iz">Condones 30 unidades</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->condones_30_unidades }}</td>
    </tr>
    <tr>
        <td class="iz">Depo Provera aplicadas</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->depo_provera_aplicadas }}</td>
    </tr>
    <tr>
        <td class="iz">DIU insertados</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->diu_insertados }}</td>
    </tr>
    <tr>
        <td class="iz">No. Usuarias utilizando el método de días fijos (collar)</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_metodo_de_dias_fijos }}</td>
    </tr>
    <tr>
        <td class="iz">Implante subdérmico</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->implante_subdermico }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con diarrea</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_diarrea }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con diarrea que acuden a cita de seguimiento</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_diarrea_seguimiento }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con deshidratación rehidratados en la US</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->ninos_de_5_rehidratados }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con casos de neumonía nuevos en el año</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_neumonia_nuevos }}</td>
    </tr>
    <tr>
        <td class="iz">Seguimiento</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->seguimiento }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con algún grado de síndrome anémico</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_5_grado_anemico }}</td>
    </tr>
    <tr>
        <td class="iz">Diagnosticado por laboratorio</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->diagnosticado_por_laboratorio }}</td>
    </tr>
    <tr>
        <td class="iz">Total de Niños/as menores de 5 años atendidos</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->total_menores_de_5_atendidos }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con Crecimiento Adecuado</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_crecimiento_adecuado }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con crecimiento inadecuado</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_crecimiento_inadecuado }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con bajo percentil 3</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_5_bajo_percentil_3 }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con daño nutricional severo</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_dano_nutricional_severo }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con discapacidad nuevos en el año</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_discapacidad_nuevos_en_el_anio }}</td>
    </tr>
    <tr>
        <td class="iz">No. Niños/as menores de 5 años con probable alteración del desarrollo</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->no_menores_de_5_con_probable_alteracion_del_desarrollo }}</td>
    </tr>
    <tr>
        <td class="iz">Atención prenatal nueva en las primeras 12 SG</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->atencion_prenatal_nueva_en_las_primeras_12_sg }}</td>
    </tr>
    <tr>
        <td class="iz">Atención puerperal nueva en los 10 primeros días</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->atencion_puerperal_nueva_en_los_10_primeros_dias }}</td>
    </tr>
    <tr>
        <td class="iz">Atención prenatal subsiguiente en las primeras 12 SG</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->atencion_prenatal_subsiguiente_en_las_primeras_12_sg }}</td>
    </tr>
    <tr>
        <td class="iz">Atención puerperal subsiguiente en los 10 primeros días</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->puerperal_sub_10_primeros_dias }}</td>
    </tr>
    <tr>
        <td class="iz">Atención puerperal subsiguiente en los 10 primeros días</td>
        <td style="border: 1px solid black; text-align: center; padding-left: 5px;">{{ $at2rs->puerperal_nueva_primeros_dias }}</td>
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