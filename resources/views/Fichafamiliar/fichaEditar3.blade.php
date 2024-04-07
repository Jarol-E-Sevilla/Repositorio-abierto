@extends('plantillas.plantilla')

@section('titulo', 'Editar Fichas Familiares')

@section('contenido')

    <div class="container">
        <div class="tituloff text-center">
            <h4><strong>SECRETARÍA DE SALUD</strong></h4>
            <h5>SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD</h5>
            <h5>DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD</h5>
            <h5>DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN</h5>
            <h2>FICHA FAMILIAR</h2><br>
        </div>
    </div>

    <form id="formulario-ficha" method="POST" action="{{ route('fichafamiliar.update3', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h4 class="font-robo t" style="margin: 0; padding:0">3. INFORMACIÓN DE MIEMBROS DE LA FAMILIA</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="nombres_y_apellidos" style="margin-left: 0;">Nombres y Apellidos </label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese los nombres y apellidos del miembro"
                           name="nombres_y_apellidos" id="nombres_y_apellidos" minlength="3" maxlength="50"
                           value="{{ old('nombres_y_apellidos', $datos->nombres_y_apellidos) }}" required>
                    @error('nombres_y_apellidos')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="No_identidad" style="margin-left: 0;">No. de identidad</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el número de identidad"
                           name="No_identidad" id="No_identidad" minlength="3" maxlength="50"
                           value="{{ old('No_identidad', $datos->No_identidad) }}" required>
                    @error('No_identidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">

                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="sexo" style="margin-left: 0;">Sexo </label><br>
                    <select class="form-select @error('sexo') is-invalid @enderror"
                            name="sexo" aria-label="Default select example"
                            id="sexo" value="{{old('sexo', $datos->sexo)}}" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="F" @if($datos->sexo == 'F') selected @endif>Masculino</option>
                        <option value="M" @if($datos->sexo == 'M') selected @endif>>Femenino</option>
                    </select>
                    @error('sexo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="parentesco" style="margin-left: 0;">Parentesco</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el parentesco"
                           name="parentesco" id="parentesco" minlength="3" maxlength="50"
                           value="{{ old('parentesco', $datos->parentesco) }}" required>
                    @error('parentesco')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="fecha_de_nacimiento" style="margin-left: 0;">Fecha de nacimiento</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese la fecha de nacimiento"
                           name="fecha_de_nacimiento" id="fecha_de_nacimiento" minlength="3" maxlength="50"
                           value="{{ old('fecha_de_nacimiento', $datos->fecha_de_nacimiento) }}" required>
                    @error('fecha_de_nacimiento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="edad" style="margin-left: 0;">Edad</label>
                    <input class="form-control border-radius-sm" type="number" placeholder="Ingrese su edad"
                           name="edad" id="edad" minlength="3" maxlength="50"
                           value="{{ old('edad', $datos->edad) }}" required>
                    @error('edad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="etnia" style="margin-left: 0;">Etnia</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese la etnia"
                           name="etnia" id="etnia" minlength="3" maxlength="50"
                           value="{{ old('etnia', $datos->etnia) }}" required>
                    @error('etnia')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="escolaridad" style="margin-left: 0;">Escolaridad</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese grado de escolaridad"
                           name="escolaridad" id="escolaridad" minlength="3" maxlength="50"
                           value="{{ old('escolaridad', $datos->escolaridad) }}" required>
                    @error('escolaridad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">

                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="trabaja_actualmente" style="margin-left: 0;">Trabaja actualmente</label><br>
                    <select class="form-select @error('trabaja_actualmente') is-invalid @enderror"
                            name="trabaja_actualmente" aria-label="Default select example"
                            id="trabaja_actualmente" value="{{old('trabaja_actualmente', $datos->trabaja_actualmente)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->trabaja_actualmente == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->trabaja_actualmente == 'no') selected @endif>No</option>
                    </select>
                    @error('trabaja_actualmente')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="ocupacion" style="margin-left: 0;">Ocupación </label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese su ocupación"
                           name="ocupacion" id="ocupacion" minlength="3" maxlength="50"
                           value="{{ old('ocupacion', $datos->ocupacion) }}" required>
                    @error('ocupacion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="vacuna_completa" style="margin-left: 0;">Vacunación completa</label><br>
                    <select class="form-select @error('vacuna_completa') is-invalid @enderror"
                            name="vacuna_completa" aria-label="Default select example"
                            id="vacuna_completa" value="{{old('vacuna_completa', $datos->vacuna_completa)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->vacuna_completa == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->vacuna_completa == 'no') selected @endif>No</option>
                    </select>
                    @error('vacuna_completa')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="riesgos" style="margin-left: 0;">Clasificación de grupos de riesgo</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese riesgo al que pertenece"
                           name="riesgos" id="riesgos" minlength="3" maxlength="50"
                           value="{{ old('riesgos', $datos->riesgos) }}" required>
                    @error('riesgos')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="PF" style="margin-left: 0;">PF</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese la planificación familiar"
                           name="PF" id="PF" minlength="3" maxlength="50"
                           value="{{ old('PF', $datos->PF) }}" required>
                    @error('PF')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="GR" style="margin-left: 0;">GR</label>
                    <input class="form-control border-radius-sm" type="text"
                           placeholder="Ingrese la planificación familiar" name="GR" id="GR" minlength="3"
                           maxlength="50" value="{{ old('GR', $datos->GR) }}" required>
                    @error('GR')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="hacinamtratamiento_para_enf_cronicaiento" style="margin-left: 0;">Tratamiento para enfermedad crónica</label><br>
                    <select class="form-select @error('tratamiento_para_enf_cronica') is-invalid @enderror"
                            name="tratamiento_para_enf_cronica" aria-label="Default select example"
                            id="tratamiento_para_enf_cronica" value="{{old('tratamiento_para_enf_cronica', $datos->tratamiento_para_enf_cronica)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->tratamiento_para_enf_cronica == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->tratamiento_para_enf_cronica == 'no') selected @endif>No</option>
                    </select>
                    @error('tratamiento_para_enf_cronica')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="font-robo form-group">
                    <label for="No_dependientes" style="margin-left: 0;">Numero de Dependientes</label>
                    <input class="form-control border-radius-sm" type="number"
                           placeholder="Ingrese el numero de dependientes" name="No_dependientes" id="No_dependientes"
                           min="1" value="{{ old('No_dependientes', $datos->No_dependientes) }}" required>
                    @error('No_dependientes')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="nombre_del_medicamento_para_enfermedad_cronica" style="margin-left: 0;">Nombre del medicamento para enfermedad crónica</label>
                    <input class="form-control border-radius-sm" type="text" placeholder="Escriba el nombre del medicamento"
                           name="nombre_del_medicamento_para_enfermedad_cronica" id="nombre_del_medicamento_para_enfermedad_cronica" minlength="3" maxlength="50"
                           value="{{ old('nombre_del_entrevistador', $datos->nombre_del_entrevistador) }}" required>
                    @error('nombre_del_medicamento_para_enfermedad_cronica')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div >

        <div class="row">
            <div class="col-12">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <div class="mb-3">
                        <label for="observaciones2" class="form-label"><em>Observaciones: </em></label>
                        <textarea class="form-control" id="observaciones2" rows="4"
                                  placeholder="Espacio para agregar información adicional">{{old('observaciones2', $datos->observaciones2)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">
        <div>
            <a href="/fichafamiliar/{{ $id }}/editar2" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#333'" onmouseout="this.style.backgroundColor='black'">
                <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> volver
            </a>
            <BUTTON type="submit" class="btn btn-primary">Siguiente</BUTTON>
        </div>
    </form>

    <div> <br><br> </div>

@endsection
