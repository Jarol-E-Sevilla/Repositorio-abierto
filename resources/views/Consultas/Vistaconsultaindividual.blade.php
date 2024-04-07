@extends('plantillas.plantilla')

@section('titulo', 'Consulta')

@section('contenido')
<div style="width: 100%; max-width: 1200px; margin: 0 auto;"> 

    <table border="double" style="width: 100%;">
        <tbody>
            @if ($consulta)
            <tr>
    <td colspan="7" style="text-align: center; font-size: 24px;"><h2>Datos del paciente</h2></td>
</tr>

                <tr>
                    <td colspan="8"><strong>Nombres:</strong> {{  $consulta->paciente->nombres }}</td>
                    <td></td>
                    <td colspan="8"><strong>Primer apellido:</strong> {{ $consulta->paciente->primer_apellido }}</td>
                    <td></td>
                    <td colspan="8"><strong>Segundo apellido:</strong> {{ $consulta->paciente->segundo_apellido }}</td>
                </tr>
                <tr>
                    <td colspan="8"><strong>Número de expediente:</strong> {{ $consulta->paciente->expediente }}</td>
                    <td></td>
                    <td colspan="8"><strong>Número de identidad (DNI):</strong> {{ $consulta->paciente->dni }}</td>
                    <td></td>
                    <td colspan="8"><strong>Fecha de nacimiento:</strong> {{ $consulta->paciente->fecha_de_nacimiento }}</td>
                </tr>
                <tr>
                    <td colspan="8"><strong>Sexo de la persona:</strong> {{ $consulta->paciente->sexo }}</td>
                    <td></td>
                    <td colspan="8"><strong>Temperatura:</strong> {{ $consulta->paciente->temperatura }}</td>
                    <td></td>
                    <td colspan="8"><strong>Peso:</strong> {{ $consulta->paciente->peso }}</td>
                </tr>
                <tr>
                    <td colspan="8"><strong>Presión arterial:</strong> {{ $consulta->paciente->presion_arterial }}</td> 
                    <td></td>
                    <td colspan="2"></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
            @else
                <tr>
                    <td colspan="7">No se encontraron datos del paciente.</td>
                </tr>
            @endif
            
            @if ($consulta)
            <tr>
        <td colspan="7"style="text-align: center; font-size: 24px;"><h2>Datos de la consulta</h2></td>
    </tr>
            <tr>
                <td colspan="8"><strong>Motivo visita:</strong> {{ $consulta->motivo_visita }}</td>
                <td></td>
                <td colspan="8"><strong>Fecha Visita:</strong> {{ $consulta->fecha_visita }}</td>
                <td></td>
                <td colspan="8"><strong>Atendido:</strong> {{ $consulta->atendido }}</td>
            </tr>
            @else
                <tr>
                    <td colspan="7">No se encontraron consultas para este paciente.</td>
                </tr>
            @endif
            @if ($consulta)
            <td colspan="7"style="text-align: center; font-size: 24px;"><h2>Datos del ATA</h2></td>
    </tr>
            <tr>
                <td colspan="8"><strong>El pacientes es:</strong> {{ $consulta->tPas }}</td>
                <td></td>
                <td colspan="8"><strong>El paciente se considera:</strong> {{ $consulta->considera }}</td>
                <td></td>
                <td colspan="8"><strong>La consulta se considera:</strong> {{ $consulta->tCon }}</td>
                <td></td>
</tr>
                <td colspan="8"><strong>Hubo detección de:</strong> {{ $consulta->deteccion }}</td>
                <td></td>
                <td colspan="8"><strong>En caso de embarazo, es:</strong> {{ $consulta->eCon }}</td>
                <td></td>
                <td colspan="8"><strong>Control puerpal:</strong> {{ $consulta->cPu }}</td>
                <td></td>
                </tr>
                <td colspan="8"><strong>Atención en embarazo (si es el caso):</strong> {{ $consulta->altEmb }}</td>
                <td></td>
                <td colspan="8"><strong>Anticonceptivos:</strong> {{ $consulta->anticonceptivos }}</td>
                <td></td>
                <td colspan="8"><strong>En caso de que el paciente sea niño:</strong> {{ $consulta->n1}}</td>
                <td></td>
                </tr>
                <td colspan="8"><strong>En caso de que el paciente sea niño: (2)</strong> {{ $consulta->n2}}</td>
            </tr>
            @else
                <tr>
                    <td colspan="7">No se encontraron datos para este paciente.</td>
                </tr>
            @endif
        </tbody> 
    </table>

    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <div style="text-align:right; margin: top 20px;">
        <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('consulta.index') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg> Volver</button>

        <a type="button"  href="{{ route('consulta.edit', ['id'=>$consulta->id]) }}" class="btn btn-success" >
            <i class="bi bi-pencil"></i>Editar
        </a>
    </div>
</div>
@endsection
