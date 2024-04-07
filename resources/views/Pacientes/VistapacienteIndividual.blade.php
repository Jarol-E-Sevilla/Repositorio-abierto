@extends('plantillas.plantilla')

@section('titulo', 'Paciente')

@section('contenido')

<div style="width: 100%; max-width: 1200px; margin: 0 auto;"> 

<h1>Datos del Paciente {{ $pacientes->nombres}}</h1>
<table border="double" style="width: 100%;">
<tbody>
 <tr>
  <th colspan="1" >Nombres</th>
  <th colspan="1"> Primer apellido&nbsp;&nbsp;</th>
  <th colspan="1">Segundo apellido &nbsp;&nbsp;</th>
  <th colspan="1" >Número de identidad(DNI)&nbsp;&nbsp;</th>
</tr>
<tr>
  <td colspan="1" >{{ $pacientes->nombres }}</td>
  <td colspan="1">{{ $pacientes->primer_apellido }}</td>
  <td colspan="1">{{ $pacientes->segundo_apellido }}</td>
  <td colspan="1" >{{ $pacientes->dni }}</td>
</tr>
<tr>
  <th colspan="1">Fecha de nacimiento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th colspan="1">Sexo de la persona&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th colspan="1" >Temperatura</th>
</tr>
<tr>
  <td colspan="1">{{ $pacientes->fecha_de_nacimiento }}</td>
  <td colspan="1">{{ $pacientes->sexo }}</td>
  <td colspan="1">{{ $pacientes->temperatura}}</td>
</tr>
 <tr>
  <th colspan="2">Peso</th>
  <th colspan="2" >Presión arterial &nbsp;&nbsp;</th>
</tr>
<tr>
  <td colspan="2">{{ $pacientes->peso }}</td>
  <td colspan="2">{{ $pacientes->presion_arterial }}</td> 

</tr>
</tbody> 
</table>
<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <div style="text-align:right; margin: top 20px;">
        <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('consulta.index') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg> Volver</button>
    </button>
    <a type="button"  href="{{ route('paciente.edit', ['id'=>$pacientes->id]) }}" class="btn btn-success" ><i class="bi bi-pencil"></i>Editar</a>
   
@endsection