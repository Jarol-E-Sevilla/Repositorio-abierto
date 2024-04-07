@extends('plantillas.plantilla')

@section('titulo', 'Empleado')

@section('contenido')

<div style="width: 100%; max-width: 1200px; margin: 0 auto;"> 

<h1>Datos del empleado {{$empleados->nombres}}</h1>
<table style="width: 100%; font-size: 18px; margin-bottom: 20px; margin-top: 20px; margin-left: auto; margin-right: auto; border: 1px solid rgba(111, 143, 175, 0.600);">

    <tbody>
     <tr>
                    <th colspan="1">Nombres</th>
                    <th colspan="1">Primer apellido</th>
                    <th colspan="1">Segundo apellido</th>
                </tr>
                <tr>
      <td colspan="1" >{{ $empleados->nombres }}</td>
      <td colspan="1">{{ $empleados->primer_apellido }}</td>
      <td colspan="1">{{ $empleados->segundo_apellido }}</td>
    </tr>
    <tr>
      <th colspan="1" >Número de identidad(DNI)&nbsp;&nbsp;</th>
      <th colspan="1">Fecha de nacimiento&nbsp;&nbsp;</th>
      <th colspan="1">Sexo de la persona</th>
    </tr>
    <tr>
      <td colspan="1" >{{ $empleados->dni }}</td>
      <td colspan="1">{{ $empleados->fecha_de_nacimiento }}</td>
      <td colspan="1">{{ $empleados->sexo }}</td>
    </tr>
     <tr>
      <th colspan="2" >Cargo</th>
      <th colspan="2">Teléfono</th>
    </tr>
    <tr>
      <td colspan="2">{{ $empleados->cargo }}</td>
      <td colspan="2">{{ $empleados->telefono }}</td>
    </tr>
     <tr>
      <th colspan="2">Procedencia</th>
    <tr>

      <td colspan="2">{{ $empleados->procedencia }}</td>

      <td></td>
    </tr>
    <tr>
      <th colspan="2" >Tipo de sangre</th>
      <th colspan="2">Rh de la persona</th>
    </tr>
    <tr>
      <td colspan="2">{{ $empleados->tipo }}</td>
      <td colspan="2">{{ $empleados->Rh }}</td>
    </tr>
    <tr>
      <th colspan="2" >Enfermedades que padece</th>
      <th colspan="2">Medicamentos y dosis</th>
    </tr>
    <tr>
      <td colspan="2">{{ $empleados->enfermedades }}</td>
      <td colspan="2">{{ $empleados->medicamentos  }}</td>
    </tr>
    </tbody> 
</table>

<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
<div style="text-align:right; margin: top 20px;">
    <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('empleado.index') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
        </svg> Volver</button>
<a type="button"  href="{{ route('empleado.edit', ['id'=>$empleados->id]) }}" class="btn btn-success" ><i class="bi bi-pencil"></i>Editar</a>

</div>
@endsection
