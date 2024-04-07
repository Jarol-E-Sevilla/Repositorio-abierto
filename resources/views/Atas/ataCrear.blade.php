@extends('Plantillas.Plantilla')

@section('titulo', 'Creacion Atas')

@section('contenido')

    <!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        .divi {
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
            font-size: 80%;
        }

        th {
            background-color: #f2f2f2;
        }

        .custom-width {
            width: 6%;
        }

        .age-container, .details-container {
            border: 1px solid black;
            width: 30%;
        }

        .age-details, .details-details {
            display: flex;
            justify-content: space-between;
            padding: 2px;
        }

        .age-child, .details-child {
            flex-basis: 25%;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            font-size: 70%;
        }

        .age-child:last-child, .details-child:last-child {
            border-right: none;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        .sl {
            width: 15px;
        }

        .narrow-procedencia {
            width: 15%;
        }
    </style>
</head>
<body>

<div class="container">
        <div class="tituloff text-center">
            <h2><strong>ATENCIONES AMBULATORIAS</strong></h2>
        </div>
    </div>

<form method="post" action="">
        
<div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Establecimiento: </label>

                    <input class="form-control border-0 border-bottom border-primary" type="text"
                        placeholder="Ingrese el nombre del establecimiento" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Código: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese código" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Tipo de establecimiento: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese el tipo de establecimiento" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Departamento: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese el departamento" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Municipio: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese el municipio" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Profesional de salud: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese el nombre del profesional de salud" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Nombre: </label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese el nombre" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="font-robo form-group">
                    <label for="nombre_del_entrevistador" style="margin-left: 0;">Fecha(dd/mm/aa):</label>

                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese la fecha" name="nombre_del_entrevistador"
                        id="nombre_del_entrevistador" minlength="3" maxlength="80"
                        value="{{ old('nombre_del_entrevistador') }}" required>
                    @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <br><br> 
            
                
</form>

<table>
    <tr>
        <th class="sl">No.</th>
        <th class="custom-width">Número de historia clínica</th>
        <th class="custom-width">Nombres y apellidos</th>
        <th class="custom-width">Número de identidad del paciente</th>
        <th class="sl vertical-text">Sexo (H/M)</th>
        <th class="custom-width">Fecha de nacimiento (dd/mm/aa)</th>
        <th class="custom-width age-container" colspan="3">
            Edad
            <div class="age-details">
                
                <div class="age-child vertical-text divi">Años</div>
                <div class="age-child vertical-text divi">Meses</div>
                <div class="age-child vertical-text divi">Días</div>
            </div>
        </th>
        <th class="sl vertical-text">Paciente</th>
        <th class="custom-width details-container" colspan="3">
            Procedencia
            <div class="details-details">
                <div class="details-child divi">Departamento</div>
                <div class="details-child divi">Municipio</div>
                <div class="details-child divi">Localidad</div>
            </div>
        </th>
        <th class="custom-width details-container narrow-procedencia" colspan="6">
            Diagnóstico
            <div class="details-details">
                <div class="details-child divi">1</div>
                <div class="details-child vertical-text divi">Condición</div>
                <div class="details-child divi">2</div>
                <div class="details-child vertical-text divi">Condición</div>
                <div class="details-child divi">3</div>
                <div class="details-child vertical-text divi">Condición</div>
            </div>
        </th>
        <th class="custom-width details-container" colspan="2">
            Referencia
            <div class="details-details">
                <div class="details-child">Enviada a</div>
                <div class="details-child">Recibida de</div>
            </div>
        </th>
    </tr>
</table><br>

<table>
    <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2"  class="custom-width">Número de historia clínica</th>
        <th rowspan="2"   style="width: 15%;">Nombres y apellidos</th>
        <th rowspan="2"  class="custom-width">No. de identidad del paciente</th>
        <th rowspan="2"  class="sl vertical-text">Sexo(H/M)</th>
        <th rowspan="2"  class="custom-width">Fecha de nacimiento (dd/mm/aa)</th>
        <th colspan="3">Edad</th>
        <th rowspan="2"  class="sl vertical-text">Paciente</th>
        <th colspan="3">Procedencia</th>
        <th colspan="6">DIAGNÓSTICO/ACTIVIDAD</th>
        <th colspan="2">Referencia</th>
        
    </tr>
    <tr>
        <th  class="sl vertical-text" colspan="3">Años</th>
        <th  class="custom-width">Departamento</th>
        <th  class="custom-width">Municipio</th>
        <th  class="custom-width">Localidad</th>
        <th>1</th>
        <th  class="sl vertical-text" style="font-size: 0.7em;">Condición</th>
        <th>2</th>
        <th  class="sl vertical-text" style="font-size: 0.7em;">Condición</th>
        <th>3</th>
        <th  class="sl vertical-text" style="font-size: 0.7em;">Condición</th>
        <th  class="custom-width">Enviar a:</th>
        <th  class="custom-width">Recibida de:</th>
    </tr>
    </thead>
    <tbody>

    <tr>
    <tr>
    
    @foreach($pacientes as $paciente)
        <tr >
            <td >{{ $paciente->id }}</td>
            <td>{{ $paciente->expediente }}</td>
            <td  style="text-align: left;">{{ $paciente->nombres }}</td>
            <td>{{ $paciente->dni }}</td>
            <td>{{ $paciente->sexo }}</td>
            <td>{{ $paciente->fecha_de_nacimiento }}</td>
           

        </tr>
        @endforeach


   
    </tr>
    </tbody>
</table>
</body>
</html>
@endsection
