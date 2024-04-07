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

        .tmx{
            text-align: center;
            width: 200px;
            border-left: none;
            border-right: none;
            border-top: none;
        }
        .tmn{
            text-align: center;
            width: 50px;
            border-left: none;
            border-right: none;
            border-top: none;
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
    <label STYLE="margin-left: 40px" for="fechaActual">Mes:</label>
    <input type="text" id="fechaActual" value="" style="border-right: none; border-top: none; border-left: none; text-align: center" />

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
    <input class="tmx" type="text" >
    <label STYLE="margin-left: 35px"> Nombre:</label>
    <input class="tmx" type="text">
    <label STYLE="margin-left: 35px"> Consulta Externa:</label>
    <input class="tmn" type="text">
    <label STYLE="margin-left: 35px"> Emergencia:</label>
    <input class="tmn" type="text">
</div>
<br>

<table id="mi-tabla">
    <thead>
    <tr>
        <th>Concepto</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="iz" id="menores1MesPVez">Menores de 1 Mes de 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="menores1MesSub">Menores de 1 Mes Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="1Ma1APVez">1 Mes a 1 año de 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="1Ma1ASub">1 mes a 1 año Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="1A4PVez">1 - 4 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="1A4Sub">1 - 4 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="5A9PVez">5 - 9 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="-5A9Sub">5 - 9 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="10A14PVez">10 - 14 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="10A14Sub">10 -14 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="15A19PVez">15 - 19 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="15A19Sub">15 - 19 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="20A49PVez">20 - 49 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="20A49Sub">20 - 49 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="50A59PVez">50 - 59 años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="50A59Sub">50 - 59 años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="60YMasPVez">60 y + años 1a Vez</td>
    </tr>
    <tr>
        <td class="iz" id="60YMasSub">60 y + años Subsiguiente</td>
    </tr>
    <tr>
        <td class="iz" id="totPAten">Total Pacientes Atendidos</td>
    </tr>
    <tr>
        <td class="iz" id="atencionMujeres">No. Atenciones de Mujeres</td>
    </tr>
    <tr>
        <td class="iz" id="atencionHombres">No. Atenciones de Hombres</td>
    </tr>
    <tr>
        <td class="iz" id="consultasEspontaneas">No. Consultas Espontáneas</td>
    </tr>
    <tr>
        <td class="iz" id="consultasReferidas">No. Consultas Referidas</td>
    </tr>
    <tr>
        <td class="iz" id="-SintomaticosR">Detección de Sintomáticos Respiratorios</td>
    </tr>
    <tr>
        <td class="iz" id="CancerCervicoU">Detección de Cáncer Cérvico Uterino</td>
    </tr>
    <tr>
        <td class="iz" id="embarazadasN">Embarazadas Nuevas</td>
    </tr>
    <tr>
        <td class="iz" id="embarazadasC">Embarazadas en Control</td>
    </tr>
    <tr>
        <td class="iz" id="controlesPuerperales">Controles Puerperales</td>
    </tr>
    <tr>
        <td class="iz" id="1Ciclo">Anticonceptivo Oral 1 Ciclo</td>
    </tr>
    <tr>
        <td class="iz" id="3Ciclos">Anticonceptivo Oral 3 Ciclo</td>
    </tr>
    <tr>
        <td class="iz" id="6Ciclos">Anticonceptivo Oral 6 Ciclo</td>
    </tr>
    <tr>
        <td class="iz" id="10Unidades">Condones 10 Unidades</td>
    </tr>
    <tr>
        <td class="iz" id="30Unidades">Condones 30 Unidades</td>
    </tr>
    <tr>
        <td class="iz" id="depoProvera">Depo Provera Aplicadas</td>
    </tr>
    <tr>
        <td class="iz" id="diuInsertados">DIU Insertados</td>
    </tr>
    <tr>
        <td class="iz" id="usuariasDiasFijos">No. Usuarias Utilizando el Método de Días Fijos (Collar)</td>
    </tr>
    <tr>
        <td class="iz" id="implanteSubdermico">Implante Subdérmico</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5Diarrea">No. Niños/as menores de 5 años con Diarrea</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5DiarreaSeg">No. Niños/as menores de 5 años con Diarrea que acuden a cita de seguimiento</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5Rehidratados">No. Niños/as menores de 5 años con Deshidratación Rehidratados en la US</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5Neumonia">No. Niños/as menores de 5 años con casos de Neumonía nuevos en el Año</td>
    </tr>
    <tr>
        <td class="iz" id="seguimiento">Seguimiento</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5SindromeAnemico">No. Niños/as menores de 5 años con algún grado de Síndrome Anémico Diagnosticado por Laboratorio</td>
    </tr>
    <tr>
        <td class="iz" id="totalMenores5Atendidos">Total de Niños/as Menores de 5 años Atendidos</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5CrecimientoAdecuado">No. Niños/as menores de 5 años con Crecimiento Adecuado</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5CrecimientoInadecuado">No. Niños/as menores de 5 años con Crecimiento Inadecuado</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5Percentil3">No. Niños/as menores de 5 años con Bajo Percentil 3</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5DanioNutricional">No. Niños/as menores de 5 años con Daño Nutricional Severo</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5DiscapacidadNuevosAnio">No. Niños/as menores de 5 años con Discapacidad Nuevos en el Año</td>
    </tr>
    <tr>
        <td class="iz" id="Menores5AlteracionDesarrollo">No. Niños/as menores de 5 años con Probable Alteración del Desarrollo</td>
    </tr>
    <tr>
        <td class="iz" id="Nueva12SG">Atención prenatal nueva en las primeras 12 SG</td>
    </tr>
    <tr>
        <td class="iz" id="Sub12SG">Atención prenatal subsiguiente en las primeras 12 SG</td>
    </tr>
    <tr>
        <td class="iz" id="atencionPuerperal10Dias">Atención puerperal nueva en los 10 primeros días</td>
    </tr>
    <tr>
        <td class="iz" id="atencionPuerperal10DiasSub">Atención puerperal subsiguiente en los 10 primeros días</td>
    </tr>
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener la fecha actual
        const fechaActual = new Date();

        // Función para obtener el número de días del mes actual
        function obtenerDiasMes(anio, mes) {
            return new Date(anio, mes + 1, 0).getDate();
        }

        // Función para generar los encabezados de las columnas con variables únicas
        function generarEncabezadosColumnas() {
            const encabezadosColumnas = document.querySelector('#mi-tabla thead tr');
            const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
            const year = fechaActual.getFullYear();
            const month = fechaActual.getMonth() + 1; // Los meses comienzan desde 0

            for (let i = 1; i <= numDias; i++) {
                const th = document.createElement('th');
                const dia = i.toString().padStart(2, '0'); // Agregar un cero inicial para días de un solo dígito
                const variable = `${dia}/${month}/${year}`; // Crear la variable única
                th.textContent = i;
                th.setAttribute('data-variable', variable); // Asignar la variable única al atributo data-variable
                encabezadosColumnas.appendChild(th);
            }
        }

        // Llamar a la función para generar los encabezados de las columnas
        generarEncabezadosColumnas();

        // Función para insertar una cantidad especificada de celdas vacías después de cada fila de datos
        function crearCeldas(cantidadCeldas) {
            const filas = document.querySelectorAll('#mi-tabla tbody tr');
            filas.forEach(fila => {
                for (let i = 0; i < cantidadCeldas; i++) {
                    const celda = document.createElement('td');
                    celda.classList.add('iz');
                    fila.appendChild(celda);
                }
            });
        }

        // Llama a la función para crear celdas vacías después de cada fila de datos
        const numDias = obtenerDiasMes(fechaActual.getFullYear(), fechaActual.getMonth());
        crearCeldas(numDias);

    });
</script>

<div> <br> <br> <br> </div>

</body>
</html>
@endsection
