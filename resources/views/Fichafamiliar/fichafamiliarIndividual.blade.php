@extends('plantillas.plantilla')

@section('titulo', 'Editar Fichas Familiares')

@section('contenido')

    <h1><center>Datos del Miembro {{$datos->nombre_del_entrevistador}}</center></h1>

    <div class="container">
        <div class="tituloff text-center">
            <h4><strong>SECRETARÍA DE SALUD</strong></h4>
            <h5>SUB SECRETARÍA DE REDES INTEGRADAS DE SERVICIOS DE SALUD</h5>
            <h5>DIRECCIÓN GENERAL DE REDES INTEGRADAS DE SERVICIOS DE SALUD</h5>
            <h5>DEPARTAMENTO DE SERVICIOS DEL PRIMER NIVEL DE ATENCIÓN</h5>
            <h2>FICHA FAMILIAR</h2><br>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="" enctype="multipart/form-data">
        @csrf

        <form method="POST" action="{{route("fichafamiliar.create")}}" enctype="multipart/form-data" id="datosgenerales">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="nombre_del_entrevistador" style="margin-left: 0;">Nombre del entrevistador: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el nombre del entrevistador"
                               name="nombre_del_entrevistador" id="nombre_del_entrevistador" minlength="3" maxlength="80"
                               value="{{ old('nombre_del_entrevistador', $datos->nombre_del_entrevistador) }}" required readonly>
                        @error('nombre_del_entrevistador')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="fecha_de_entrevista" style="margin-left: 0;">Fecha de entrevista: </label>
                        <input class="form-control border-radius-sm" type="date" placeholder="Ingrese la fecha que se realiza la entrevista"
                               name="fecha_de_entrevista" id="fecha_de_entrevista" max="13"
                               value="{{ old('fecha_de_entrevista', $datos->fecha_de_entrevista) }}" required readonly>
                        @error('fecha_de_entrevista')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="región_sanitaria" style="margin-left: 0;">Región sanitaria: </label>
                        <input class="form-control border-radius-sm" type="number"
                               name="región_sanitaria" id="región_sanitaria" minlength="1" maxlength="50" placeholder="Ingrese la región sanitaria"
                               value="{{ old('región_sanitaria', $datos->region_sanitaria) }}" required readonly>
                        @error('región_sanitaria')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Validar la entrada para permitir solo hasta 3 caracteres
                        document.getElementById('región_sanitaria').addEventListener('input', function() {
                            if (this.value.length > 3) {
                                this.value = this.value.slice(0, 3); // Limitar a 3 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('región_sanitaria').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>

                </div>
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="establecimiento_de_salud_sede_del_equipo" style="margin-left: 0;">Establecimiento de salud sede del equipo: </label>
                        <input class="form-control border-radius-sm" type="text"  placeholder="Nombre del establecimiento de salud sede del equipo"
                               name="establecimiento_de_salud_sede_del_equipo" id="establecimiento_de_salud_sede_del_equipo" maxlength="100"
                               value="{{ old('establecimiento_de_salud_sede_del_equipo', $datos->establecimiento_de_salud_sede_del_equipo) }}" required readonly>
                        @error('establecimiento_de_salud_sede_del_equipo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="sector" style="margin-left: 0;">Sector: </label>
                        <input class="form-control border-radius-sm" type="text"
                               name="sector" id="sector" minlength="3" maxlength="50" placeholder="Ingrese el sector al que pertenece la familia"
                               value="{{ old('sector', $datos->sector) }}" required readonly>
                        @error('sector')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div><br>

            <h4 class="font-robo t" style="margin: 0; padding:0">1. DATOS GENERALES </h4>
            <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="número_de_identidad_del_jefe_de_la_casa" style="margin-left: 0;">Número de identidad del jefe(a) de la familia: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="xxxx xxxx xxxx"
                               name="número_de_identidad_del_jefe_de_la_casa" id="número_de_identidad_del_jefe_de_la_casa"
                               value="{{ old('número_de_identidad_del_jefe_de_la_casa', $datos->numero_de_identidad_del_jefe_de_la_casa) }}" required readonly>
                        @error('número_de_identidad_del_jefe_de_la_casa')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Validar la entrada para permitir solo hasta 13 caracteres
                        document.getElementById('número_de_identidad_del_jefe_de_la_casa').addEventListener('input', function() {
                            if (this.value.length > 13) {
                                this.value = this.value.slice(0, 13); // Limitar a 13 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('número_de_identidad_del_jefe_de_la_casa').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>

                </div>
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="número_de_celular_o_fijo" style="margin-left: 0;">Número de celular o fijo: </label>
                        <input class="form-control border-radius-sm" type="number" placeholder="xxxxxxxx"
                               name="número_de_celular_o_fijo" id="número_de_celular_o_fijo"
                               value="{{ old('número_de_celular_o_fijo', $datos->numero_de_celular_o_fijo) }}" required readonly>
                        @error('número_de_celular_o_fijo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        document.getElementById('número_de_celular_o_fijo').addEventListener('input', function() {
                            if (this.value.length > 8) {
                                this.value = this.value.slice(0, 8); // Limitar a 13 caracteres
                            }
                        });

                        document.getElementById('número_de_celular_o_fijo').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>

                </div>
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="nombre_completo_del_jefe_de_la_familia" style="margin-left: 0;">Nombre del jefe(a) de la familia: </label>
                        <input class="form-control border-radius-sm" type="text"
                               name="nombre_completo_del_jefe_de_la_familia" id="nombre_completo_del_jefe_de_la_familia" minlength="3" maxlength="50"
                               placeholder="Nombre del jefe de familia"
                               value="{{ old('nombre_completo_del_jefe_de_la_familia', $datos->nombre_completo_del_jefe_de_la_familia) }}" required readonly>
                        @error('nombre_completo_del_jefe_de_la_familia')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="estado_civil" style="margin-left: 0;">Estado Civil</label>
                        <select class="form-select @error('estado_civil') is-invalid @enderror" name="estado_civil"
                                aria-label="Default select example" id="estado_civil" value="{{ old('estado_civil', $datos->estado_civil) }}" required disabled>
                            <option value="" selected disabled>Selecionar</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Union Libre">Unión Libre</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->estado_civil }}">{{old('estado_civil', $datos->estado_civil)}}</option>
                        </select>
                        @error('estado_civil')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="número_de_vivienda" style="margin-left: 0;">Número de vivienda: </label>
                        <input class="form-control border-radius-sm" type="number" placeholder="Número de vivienda"
                               name="número_de_vivienda" id="número_de_vivienda" minlength="3" maxlength="10"
                               value="{{ old('número_de_vivienda', $datos->numero_de_vivienda) }}" required readonly>
                        @error('número_de_vivienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <script>
                            document.getElementById('número_de_vivienda').addEventListener('input', function() {
                                if (this.value.length > 5) {
                                    this.value = this.value.slice(0, 5); // Limitar a 5 caracteres
                                }
                            });

                            document.getElementById('número_de_vivienda').addEventListener('keypress', function(event) {
                                if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                    event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-3">
                    <div class="font-robo form-group">
                        <label for="Aldea_Caserio_Barrio_Colonia" style="margin-left: 0;">Aldea/Caserío/Barrio o Colonia: </label>
                        <input class="form-control border-radius-sm" type="text"
                               name="Aldea_Caserio_Barrio_Colonia" id="Aldea_Caserio_Barrio_Colonia" minlength="3" maxlength="100"
                               placeholder="Escriba el nombre del lugar donde vive"
                               value="{{ old('Aldea_Caserio_Barrio_Colonia', $datos->Aldea_Caserio_Barrio_Colonia) }}" required readonly>
                        @error('Aldea_Caserio_Barrio_Coloniaa')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="referencia_vecinal" style="margin-left: 0;">Referencia Vecinal: </label>
                        <input class="form-control border-radius-sm" type="text"
                               name="referencia_vecinal" id="referencia_vecinal" placeholder="Ingrese la referencia vecinal" maxlength="100"
                               value="{{ old('referencia_vecinal', $datos->referencia_vecinal) }}" required readonly>
                        @error('referencia_vecinal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="area" style="margin-left: 0;">Área: </label>
                        <select class="form-select @error('area') is-invalid @enderror" name="area"
                                aria-label="Default select example" id="area" value="{{ old('area', $datos->area) }}" required disabled>
                            <option value="" selected disabled>Selecionar</option>
                            <option value="Urbana">Urbana</option>
                            <option value="Rural">Rural</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->area }}">{{old('area', $datos->area)}}</option>
                        </select>
                        @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="municipio" style="margin-left: 0;">Municipio: </label>
                        <input class="form-control border-radius-sm" type="text"
                               name="municipio" id="municipio" minlength="3" maxlength="50" placeholder="Ingrese el municipio el que pertenece"
                               value="{{ old('municipio', $datos->municipio) }}" required readonly>
                        @error('municipio')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <br><label for="estadocivil" style="margin-left: 0;" ><b>Distancia y tiempo de llegar al establecimiento más cercano: </b></label>

            <div class="row">

                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="distancia_en_kilometros" style="margin-left: 0;">Kilómetros: </label>
                        <input class="form-control border-radius-sm" type="number" placeholder="Ingresar numero de kilómetros"
                               name="distancia_en_kilómetros" id="distancia_en_kilometros" maxlength="3"
                               value="{{ old('distancia_en_kilometros', $datos->distancia_en_kilometros) }}" required readonly>
                        @error('distancia_en_kilometros')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <script>
                            // Validar la entrada para permitir solo hasta 3 dígitos
                            document.getElementById('distancia_en_kilometros').addEventListener('input', function() {
                                if (this.value.length > 3) {
                                    this.value = this.value.slice(0, 3); // Limitar a 3 caracteres
                                }
                            });

                            // Validar la entrada para permitir solo números
                            document.getElementById('distancia_en_kilometros').addEventListener('keypress', function(event) {
                                if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                    event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="horas" style="margin-left: 0;">Horas: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingresar numero de horas"
                               name="horas" id="horas" minlength="3"
                               value="{{ old('horas', $datos->horas) }}" required readonly>
                        @error('horas')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <script>
                        // Validar la entrada para permitir solo hasta 3 dígitos
                        document.getElementById('horas').addEventListener('input', function() {
                            if (this.value.length > 3) {
                                this.value = this.value.slice(0, 3); // Limitar a 3 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('horas').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="minutos" style="margin-left: 0;">Minutos: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingresar numero de minutos"
                               name="minutos" id="minutos" minlength="3" maxlength="50"
                               value="{{ old('minutos', $datos->minutos) }}" required readonly>
                        @error('minutos')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Validar la entrada para permitir solo hasta 3 dígitos
                        document.getElementById('minutos').addEventListener('input', function() {
                            if (this.value.length > 2) {
                                this.value = this.value.slice(0, 2); // Limitar a 3 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('minutos').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="font-robo form-group">
                        <label for="nombre_del_establecimiento_más_cercano" style="margin-left: 0;">Nombre del establecimiento de salud más cercano: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingresar el nombre del establecimiento más cercano"
                               name="nombre_del_establecimiento_más_cercano" id="nombre_del_establecimiento_más_cercano" maxlength="100"
                               value="{{ old('nombre_del_establecimiento_más_cercano', $datos->nombre_del_establecimiento_mas_cercano) }}" required readonly>
                        @error('nombre_del_establecimiento_más_cercano')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>

        <h4 class="font-robo t" style="margin: 0; padding:0">2. INFORMACION DE HOGAR</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
        <form method="POST" action="{{route("fichafamiliar.create")}}" enctype="multipart/form-data">

            <label for="establecimientoName" style="margin-left: 0;"><b>A. HIGIÉNICOS - SANITARIOS</b></label><br><br>

            <label for="establecimientoName" style="margin-left: 0;"><em><b>1. Características de viviendas</b></em></label><br>
            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="techo_con_materiales_de_desecho" style="margin-left: 0;">Techo con materiales de desecho: </label><br>

                        <select class="form-select @error('techo_con_materiales_de_desecho') is-invalid @enderror"
                                name="techo_con_materiales_de_desecho" aria-label="Default select example"
                                id="techo_con_materiales_de_desecho" value="{{old('techo_con_materiales_de_desecho',$datos->techo_con_materiales_de_desecho)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->techo_con_materiales_de_desecho }}">{{old('techo_con_materiales_de_desecho', $datos->techo_con_materiales_de_desecho)}}</option>
                        </select>
                        @error('techo_con_materiales_de_desecho')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="piso_de_tierra" style="margin-left: 0;">Piso de tierra:</label><br>
                        <select class="form-select @error('piso_de_tierra') is-invalid @enderror"
                                name="piso_de_tierra" aria-label="Default select example"
                                id="piso_de_tierra" value="{{old('piso_de_tierra', $datos->piso_de_tierra)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->piso_de_tierra }}">{{old('piso_de_tierra', $datos->piso_de_tierra)}}</option>
                        </select>
                        @error('piso_de_tierra')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="fogón_sin_chimenea_dentro_de_la_vivienda" style="margin-left: 0;">Fogón sin chimenea dentro de la vivienda:</label><br>
                        <select class="form-select @error('fogón_sin_chimenea_dentro_de_la_vivienda') is-invalid @enderror"
                                name="fogón_sin_chimenea_dentro_de_la_vivienda" aria-label="Default select example"
                                id="fogón_sin_chimenea_dentro_de_la_vivienda" value="{{old('fogon_sin_chimenea_dentro_de_la_vivienda', $datos->fogon_sin_chimenea_dentro_de_la_vivienda)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->fogon_sin_chimenea_dentro_de_la_vivienda }}">{{old('fogon_sin_chimenea_dentro_de_la_vivienda', $datos->fogon_sin_chimenea_dentro_de_la_vivienda)}}</option>
                        </select>
                        @error('fogón_sin_chimenea_dentro_de_la_vivienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="criaderos_de_vectores" style="margin-left: 0;">Criaderos de vectores: </label><br>
                        <select class="form-select @error('criaderos_de_vectores') is-invalid @enderror"
                                0          name="criaderos_de_vectores" aria-label="Default select example"
                                id="criaderos_de_vectores" value="{{old('criaderos_de_vectores', $datos->criaderos_de_vectores)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->criaderos_de_vectores }}">{{old('criaderos_de_vectores', $datos->criaderos_de_vectores)}}</option>
                        </select>
                        @error('criaderos_de_vectores')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="animales_dentro_de_la_vivienda" style="margin-left: 0;">Animales dentro de la vivienda:</label><br>
                        <select class="form-select @error('animales_dentro_de_la_vivienda') is-invalid @enderror"
                                name="animales_dentro_de_la_vivienda" aria-label="Default select example"
                                id="animales_dentro_de_la_vivienda"  value="{{old('animales_dentro_de_la_vivienda', $datos->animales_dentro_de_la_vivienda)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->animales_dentro_de_la_vivienda }}">{{old('animales_dentro_de_la_vivienda', $datos->animales_dentro_de_la_vivienda)}}</option>
                        </select>
                        @error('animales_dentro_de_la_vivienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="abastecimiento_de_agua" style="margin-left: 0;"><em><b>2. Abastecimiento de agua</b></em></label><br>
                        <select class="form-select @error('abastecimiento_de_agua') is-invalid @enderror"
                                name="abastecimiento_de_agua" aria-label="Default select example"
                                id="abastecimiento_de_agua" value="{{old('abastecimiento_de_agua', $datos->abastecimiento_de_agua)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="Pozo_publico">Pozo público</option>
                            <option value="Pozo_domicilio">Pozo domicilio</option>
                            <option value="Carro_cisterna">Carro cisterna</option>
                            <option value="Corrientes_superficiales">Corrientes superficiales</option>
                            <option value="Llave_pública">Llave pública</option>
                            <option value="Conexión_o_llave_en_domicilio">Conexión o llave en domicilio</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->abastecimiento_de_agua }}">{{old('abastecimiento_de_agua', $datos->abastecimiento_de_agua)}}</option>
                        </select>
                        @error('abastecimiento_de_agua')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="agua_para_consumo" style="margin-left: 0;"><em><b>3. Agua para consumo</b></em></label><br>
                        <select class="form-select @error('agua_para_consumo') is-invalid @enderror"
                                name="agua_para_consumo" aria-label="Default select example"
                                id="agua_para_consumo" value="{{old('agua_para_consumo', $datos->agua_para_consumo)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="No_tratado">No tratado</option>
                            <option value="Botellón(agua purificada)">Botellón (agua purificada)</option>
                            <option value="Filtrado">Filtrado</option>
                            <option value="Hervida">Hervida</option>
                            <option value="Clorada">Clorada</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->agua_para_consumo }}">{{old('agua_para_consumo', $datos->agua_para_consumo)}}</option>
                        </select>
                        @error('agua_para_consumo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="eliminacion_de_excretas" style="margin-left: 0;"><em><b>4. Eliminación de excretas</b></em></label><br>
                        <select class="form-select @error('eliminacion_de_excretas') is-invalid @enderror"
                                name="eliminacion_de_excretas" aria-label="Default select example"
                                id="eliminacion_de_excretas" value="{{old('eliminacion_de_excretas', $datos->eliminacion_de_excretas)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="Letrina_de_foso_simple">Letrina de foso simple</option>
                            <option value="Inododo_o_servicio_sanitario">Inodoro o servicio sanitario</option>
                            <option value="Letrina_de_cierre_hidráulico">Letrina de cierre hidráulico</option>
                            <option value="Aire_libre">Aire libre</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->eliminacion_de_excretas }}">{{old('eliminacin_de_excretas', $datos->eliminacion_de_excretas)}}</option>
                        </select>
                        @error('eliminacion_de_excretas')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="eliminacion_de_basura" style="margin-left: 0;"><em><b>5. Eliminación de basura</b></em></label><br>
                        <select class="form-select @error('eliminacion_de_basura') is-invalid @enderror"
                                name="eliminacion_de_basura" aria-label="Default select example"
                                id="eliminacion_de_basura" value="{{old('eliminacion_de_basura', $datos->eliminacion_de_basura)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="Tren_de_aseo">Tren de aseo</option>
                            <option value="La_entierra">La entierra</option>
                            <option value="Quema_de_basura">Quema de basura</option>
                            <option value="Aire_libre">Aire libre</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->eliminacion_de_basura }}">{{old('eliminacion_de_basura', $datos->eliminacion_de_basura)}}</option>
                        </select>
                        @error('eliminacion_de_basura')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <label for="establecimientoName" style="margin-left: 0;"><b>B. ECONÓMICO</b></label><br><br>

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="energia_electrica" style="margin-left: 0;">Energía eléctrica: </label><br>
                        <select class="form-select @error('energia_electrica') is-invalid @enderror"
                                name="energia_electrica" aria-label="Default select example"
                                id="energía_eléctrica" value="{{old('energia_electrica', $datos->energia_electrica)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->energia_electrica }}">{{old('energia_electrica', $datos->energia_electrica)}}</option>
                        </select>
                        @error('energia_electrica')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="hacinamiento" style="margin-left: 0;">Hacinamiento: </label><br>
                        <select class="form-select @error('hacinamiento') is-invalid @enderror"
                                name="hacinamiento" aria-label="Default select example"
                                id="hacinamiento" value="{{old('hacinamiento', $datos->hacinamiento)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->hacinamiento }}">{{old('hacinamiento', $datos->hacinamiento)}}</option>
                        </select>
                        @error('hacinamiento')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="beneficiarios" style="margin-left: 0;">Beneficiarios de bono:</label><br>
                        <select class="form-select @error('beneficiarios') is-invalid @enderror"
                                name="beneficiarios" aria-label="Default select example"
                                id="beneficiarios" value="{{old('beneficiarios', $datos->beneficiarios)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->beneficiarios }}">{{old('beneficiarios', $datos->beneficiarios)}}</option>
                        </select>
                        @error('beneficiarios')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <div class="mb-3">
                            <label for="observaciones1" class="form-label"><em>Observaciones: </em></label>
                            <textarea class="form-control" id="observaciones1" rows="6"
                                      placeholder="Espacio para agregar información adicional" readonly>{{old('observaciones1', $datos->observaciones1)}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <div class="mb-3"><br>
                            <p>Aquellos con más de tres personas en promedio por cuarto utilizando para dormir.<br>
                                Materiales de desechos: de lata, tela cartón, estera o caña, plástico u otros materiales de desecho o
                                condiciones precarias; con piso de tierra. Se incluyen las móviles, refigio natural, puente similares.
                                Según la definición de Necesidad Básica insatisfecha (NBI). Especificar en observaciones que características
                                físicas inadecuadas.</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="indicaRiesgo">
                                <label class="form-check-label" for="indicaRiesgo">
                                    <em>Indica riesgo</em>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <h4 class="font-robo t" style="margin: 0; padding:0">3. INFORMACIÓN DE MIEMBROS DE LA FAMILIA</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
        <form method="POST" action="{{route("fichafamiliar.create")}}" enctype="multipart/form-data">

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="nombres_y_apellidos" style="margin-left: 0;">Nombres y Apellidos </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingrese los nombres y apellidos del miembro"
                               name="nombres_y_apellidos" id="nombres_y_apellidos" minlength="3" maxlength="50"
                               value="{{ old('nombres_y_apellidos', $datos->nombres_y_apellidos) }}" required readonly>
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
                               value="{{ old('No_identidad', $datos->No_identidad) }}" required readonly>
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
                                id="sexo" value="{{old('sexo', $datos->sexo)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="F">Masculino</option>
                            <option value="M">Femenino</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->sexo }}">{{old('sexo', $datos->sexo)}}</option>
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
                               value="{{ old('parentesco', $datos->parentesco) }}" required readonly>
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
                               value="{{ old('fecha_de_nacimiento', $datos->fecha_de_nacimiento) }}" required readonly>
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
                               value="{{ old('edad', $datos->edad) }}" required readonly>
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
                               value="{{ old('etnia', $datos->etnia) }}" required readonly>
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
                               value="{{ old('escolaridad', $datos->escolaridad) }}" required readonly>
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
                                id="trabaja_actualmente" value="{{old('trabaja_actualmente', $datos->trabaja_actualmente)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->trabaja_actualmente }}">{{old('trabaja_actualmente', $datos->trabaja_actualmente)}}</option>
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
                               value="{{ old('ocupacion', $datos->ocupacion) }}" required readonly>
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
                                id="vacuna_completa" value="{{old('vacuna_completa', $datos->vacuna_completa)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->vacuna_completa }}">{{old('vacuna_completa', $datos->vacuna_completa)}}</option>
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
                               value="{{ old('riesgos', $datos->riesgos) }}" required readonly>
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
                        <input class="form-control border-radius-sm" type="date" placeholder="Ingrese la planificación familiar"
                               name="PF" id="PF" minlength="3" maxlength="50"
                               value="{{ old('PF', $datos->PF) }}" required readonly>
                        @error('PF')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">


                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="hacinamtratamiento_para_enf_cronicaiento" style="margin-left: 0;">Tratamiento para enfermedad crónica</label><br>
                        <select class="form-select @error('tratamiento_para_enf_cronica') is-invalid @enderror"
                                name="tratamiento_para_enf_cronica" aria-label="Default select example"
                                id="tratamiento_para_enf_cronica" value="{{old('tratamiento_para_enf_cronica', $datos->tratamiento_para_enf_cronica)}}" required disabled>
                            <option value="" selected disabled>Seleccionar</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                            <option disabled="disabled" selected="selected" value="{{ $datos->tratamiento_para_enf_cronica }}">{{old('tratamiento_para_enf_cronica', $datos->tratamiento_para_enf_cronica)}}</option>
                        </select>
                        @error('tratamiento_para_enf_cronica')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="nombre_del_medicamento_para_enfermedad_cronica" style="margin-left: 0;">Nombre del medicamento para enfermedad crónica</label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Escriba el nombre del medicamento"
                               name="nombre_del_medicamento_para_enfermedad_cronica" id="nombre_del_medicamento_para_enfermedad_cronica" minlength="3" maxlength="50"
                               value="{{ old('nombre_del_entrevistador', $datos->nombre_del_entrevistador) }}" required readonly>
                        @error('nombre_del_medicamento_para_enfermedad_cronica')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <div class="mb-3">
                            <label for="observaciones2" class="form-label"><em>Observaciones: </em></label>
                            <textarea class="form-control" id="observaciones2" rows="4"
                                      placeholder="Espacio para agregar información adicional" readonly>{{old('observaciones2', $datos->observaciones2)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <h4 class="font-robo t" style="margin: 0; padding:0">4. MORTALIDAD EN EL ÚLTIMO AÑO</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nombre y Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Causa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">
                    <input class="form-control border-radius-sm" type="number" placeholder="Número de mortalidad"
                           name="no_mortalidad" id="no_mortalidad"
                           value="{{ old('no_mortalidad', $datos->no_mortalidad) }}" readonly >
                    @error('no_mortalidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </th>
                <td>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el nombre del fallecito"
                           name="nombre_y_apellido" id="nombre_y_apellido" minlength="3" maxlength="50"
                           value="{{ old('nombre_y_apellido', $datos->nombre_y_apellido) }}" readonly>
                    @error('nombre_y_apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </td>
                <td>
                    <input class="form-control border-radius-sm" type="number" placeholder="Edad que falleció"
                           name="edad_mortalidad" id="edad_mortalidad"
                           value="{{ old('edad_mortalidad', $datos->edad_mortalidad) }}" readonly>
                    @error('edad_mortalidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </td>
                <td>
                    <input class="form-control border-radius-sm" type="text" placeholder="Causa de muerte"
                           name="causa" id="causa"
                           value="{{ old('causa', $datos->causa) }}" readonly>
                    @error('causa')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <div class="mb-3">
                        <label for="observaciones4" class="form-label"><em>Observaciones: </em></label>
                        <textarea class="form-control" id="observaciones4" rows="5"
                                  placeholder="Espacio para agregar información adicional" readonly>{{old('observaciones4', $datos->observaciones4)}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </FORM>

    <br><br>
    <div class="row">
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <b>PF: Planificación Familiar</b>
                <ul>
                    <li>ACO= Anticonceptivos orales.</li>
                    <li>Con= Condón.</li>
                    <li>Iny= Inyección.</li>
                    <li>DIU= Dispositivo Intrauterino.</li>
                    <li>EsM= Esterilización másculina.</li>
                    <li>EsF= Esterilización femenina.</li>
                    <li>Abs= Abstinencia.</li>
                    <li>MeN= Métodos naturales.</li>
                    <li>Otr= Otros.</li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <b>Tabla de clasificación nacional de ocupaciones</b>
                <ol>
                    <li>Dirección de las empresas y de las administraciones públicas.</li>
                    <li>Técnicos y Profesionales Científicos e intelectuales.</li>
                    <li>Técnicos y profesionales de apoyo.</li>
                    <li>Empleados de tipo administrativo.</li>
                    <li>Trabajadores de los servicios de restauración, personales, protección y vendedores de los comercios.</li>
                    <li>Trabajadores clasificados en la agricultura y en la pesca.</li>
                    <li>Artesanos y trabajadores clasificados de las industrias manufactureras, la construcción, y la minería
                        excepto los operadores de instalaciones y maquinaria.
                    </li>
                    <li>Operadores de instalaciones, maquinaria y montadores.</li>
                    <li>Trabajadores no calificados.</li>
                    <li>Fuerzas armadas.</li>
                </ol>
            </div>
        </div>
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <b>Étnia ¿A qué pueblo pertenece?</b>
                <ol>
                    <li>Maya - Chortí</li>
                    <li>Lenca</li>
                    <li>Miskito</li>
                    <li>Nahua</li>
                    <li>Pech</li>
                    <li>Tolupán</li>
                    <li>Tawahka</li>
                    <li>Garífuna</li>
                    <li>Negro de habla inglesa</li>
                    <li>Mestizo</li>
                    <li>Otro</li>
                </ol>
            </div>
        </div>
    </div>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

    <p><b>Riesgos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gr: </b>Grupo de Riesgo.</p>

    <b>Gripo I: Personas aparentemente sanas</b></br>
    <div class="row">
        <div class="col-6">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <b>Grupo II: Personas con riesgos</b>
                <ol>
                    <li>Embarazo en adolescencia (menor de 18 años).</li>
                    <li>Embarazo en mayores de 35 años.</li>
                    <li>Embarazada con intervalo de 2 años.</li>
                    <li>Embarazada sin atención prenatal.</li>
                    <li>Embarazada sin prueba de VIH y sífilis.</li>
                    <li>Embarazada sin esquema de vacuna.</li>
                    <li>Puerperio.</li>
                    <li>Cesárea Anterior.</li>
                    <li>Parto difícil (distócico).</li>
                    <li>Aborto a repetición.</li>
                    <li>Multiparidad (más de tres partos).</li>
                    <li>Apgar bajo al minuto(menor de 6).</li>
                    <li>Trauma Obstrético.</li>
                    <li>Bajo peso al nacer.</li>
                    <li>Peso estacionario en niños menores de 5 años.</li>
                    <li>No lactancia materna exclusiva (menores de 6 m).</li>
                    <li>Contacto con personas que tienen alguna enfemedad transmisible.</li>
                    <li>Antecedentes de enfermedades respiratorias.</li>
                    <li>Antecedentes de Sepsis (Madre e hijo/a).</li>
                    <li>Hijo/a de madre infectada por Hepatitis B o VIH positivo.</li>
                    <li>Hijo de madre infectada por VIH que no recibe leche artificial (menos de 1 año).</li>
                    <li>Enfermedad diarreica a repetición.</li>
                    <li>IRA a repetición.</li>
                    <li>Retraso del desarrollo psicomotor.</li>
                    <li>Mordedura de animales.</li>
                    <li>No sabe leer ni escribir.</li>
                    <li>Deserción y retraso escolar.</li>
                    <li>Hábito de bebida alcoholica y otras adicciones.</li>
                    <li>Hábito de fumar.</li>
                    <li>Antecedentes de alérgicos.</li>
                    <li>Conductas inadecuadas.</li>
                    <li>Riesgo en el trabajo.</li>
                    <li>Antecedentes del intento de suicidio.</li>
                    <li>Hijo de madre adolescente o embarazo oculto o rechazado.</li>
                    <li>Padres ausentes por mucho tiempo.</li>
                    <li>Violencia doméstica.</li>
                </ol>
            </div>
        </div>
        <div class="col-6">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <ol start="37">
                    <li>Madre o padre soltero.</li>
                    <li>Otros riesgos.</li><br>
                    <b>Grupo III: Personas enfermas</b>
                    <li>Desnutrición infantil.</li>
                    <li>Desnutrición Materna.</li>
                    <li>Hipertención Arterial.</li>
                    <li>Enfermedad cerebrovascular.</li>
                    <li>Diabetes.</li>
                    <li>Diarrea crónica.</li>
                    <li>Tuberculosis.</li>
                    <li>Meningitis.</li>
                    <li>Malaria (paludismo).</li>
                    <li>Sarampión.</li>
                    <li>Hepatitis.</li>
                    <li>Epilepsia.</li>
                    <li>Asma bronquial.</li>
                    <li>Infecciones de transmisión sexual (ITS).</li>
                    <li>VIH/SIDA.</li>
                    <li>Neumonía.</li>
                    <li>Neoplasias (Cáncer).</li>
                    <li>Otras enfermedades crónicas.</li>
                    <li>Multimedicado/a.</li>
                    <li>Obesidad.</li>
                    <li>Lepra.</li>
                    <li>Toxemia de embarazo (embarazada con presión alta).</li>
                    <li>Anemias de células falciformes.</li>
                    <li>Reumatismo.</li>
                    <li>Depresiones.</li>
                    <li>Esquizofrenia.</li>
                    <li>Otras enfermedades.</li><br>
                    <b>Grupo IV: Personas con discapacidad</b>
                    <li>Discapacidad (secuelas) por accidentes.</li>
                    <li>Discapacidad (secuelas) por enfermedades.</li>
                    <li>Discapacidad (secuelas) por cogénitas.</li>
                </ol>
            </div>
        </div>
    </div>

    <ul><b>Importante:</b>
        <li>De encontrar en los miembros de la familia condiciones no especificadas, como ser: otras enfermedades crónicas,
            enfermedades odontológicas, comportamientos inadecuados, antecedentes alérgicos, riesgos en el trabajo u otros riesgos,
            por favor, especificar en OBSERVACIONES.
        </li>
        <li>Hijo/a de madre infectada por VIH no debe recibir lactancia materna.
        </li>
    </ul>

    <h4 class="font-robo t" style="margin: 0; padding:0">5. EVALUACIÓN DE RIESGO</h4>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <div class="row">
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>A. Biológicos</b></label><br>

                <select class="form-select @error('evaluacion_del_riesgo_familiar') is-invalid @enderror"
                        name="evaluacion_del_riesgo_familiar" aria-label="Default select example"
                        id="evaluacion_del_riesgo_familiar" value="{{old('evaluacion_del_riesgo_familiar', $datos->evaluacion_del_riesgo_familiar)}}" required disabled>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Grupo_I_de_riesgo">I. El(los) miembro(s) está(n) en el grupo IV de riesgo.</option>
                    <option value="Grupo_II_de_riesgo">II. El(los) miembro(s) está(n) en el grupo III de riesgo.</option>
                    <option value="Grupo_III_de_riesgo">III. El(los) miembro(s) está(n) en el grupo II de riesgo.</option>
                    <option value="Grupo_IV_de_riesgo">IV. El(los) miembro(s) está(n) en el grupo I de riesgo.</option>
                    <option disabled="disabled" selected="selected" value="{{ $datos->evaluacion_del_riesgo_familiar }}">{{old('evaluacion_del_riesgo_familiar', $datos->evaluacion_del_riesgo_familiar)}}</option>
                </select>
                @error('evaluacion_del_riesgo_familiar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>

        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>B. Higiénicos - Sanitarios</b></label><br>

                <select class="form-select @error('higienicos_sanitarios') is-invalid @enderror"
                        name="higiénicos_sanitarios" aria-label="Default select example"
                        id="higiénicos_sanitarios" value="{{old('higienicos_sanitarios', $datos->higienicos_sanitarios)}}" required disabled>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="Con_dos_o_más_condiciones_inadecuadas">I. Con dos(2) o más condiciones inadecuadas(según sección No 2).</option>
                    <option value="Con_una_condición_inadecuada">II. Con una(1) o más condición inadecuadas(según sección No 2).</option>
                    <option value="Con_tres_condiciones_inadecuadas">III. Con ninguna condición inadecuada(según sección No 2).</option>
                    <option value="Esta_en_condición_inadecuada">IV. Está en otra condición inadecuada. </option>
                    <option disabled="disabled" selected="selected" value="{{ $datos->higienicos_sanitarios }}">{{old('higienicos_sanitarios', $datos->higienicos_sanitarios)}}</option>
                </select>
                @error('higienicos_sanitarios')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
                <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>C. Socio-económicos</b></label><br>

                <select class="form-select @error('socio_económico') is-invalid @enderror"
                        name="socio_económico" aria-label="Default select example"
                        id="socio_económico" value="{{old('socio_economico', $datos->socio_economico)}}" required disabled>
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="La_vivienda_tiene_características_físicas_inadecuadas">I. La vivienda tienen características físicas no adecuadas. </option>
                    <option value="La_vivienda_tiene_servicios_inadecuados">II. La vivienda tiene servicios inadecuados.</option>
                    <option value="El_hogar_se_encuentra_en_estado_de_hacinamiento_crítico">IIII. En el hogar existen niños(as) que no asisten a la escuela(6 a 12 años).</option>
                    <option value="En_el_hogar_existen_niños_que_no_asisten_a_la_escuela">IV. El hogar tienen una alta dependencia económica.</option>
                    <option disabled="disabled" selected="selected" value="{{ $datos->socio_economico }}">{{old('socio_economico', $datos->socio_economico)}}</option>
                </select>
                @error('socio_económico')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
            </div>
        </div>
        <div class="col-4">
            <div class="font-robo form-group" style="margin-bottom: 5px">
            </div>
        </div>
    </div>

    <p><b>Necesidades Básicas Isatisfechas (NBI)</b></p>
    <p>La definicion establece a un hogar com pobre si se presenta una de las condiciones,
        o en situación de extrema pobreza si presenta dos o más condiciones de las de C. Socio-económica.
    </p>

    <div class="mb-3 col-12">
        <label for="observaciones5" class="form-label"><em>Observaciones: </em></label>
        <textarea class="form-control" id="observaciones5" rows="5"
                  placeholder="Espacio para agregar información adicional" readonly>{{old('observaciones5', $datos->observaciones5)}}</textarea>
    </div>


    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <div style="text-align:right; margin: top 20px;">
        <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('fichaformulario.index') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg> Volver</button>

        <a href="{{ route('fichafamiliar.pdf', ['id' => $fichasFamiliares->id]) }}" target="_blank" class="btn btn-secondary" style="margin-left: 10px; margin-right: 10px;" onMouseOver="this.style.backgroundColor='#1e7e34'" onMouseOut="this.style.backgroundColor='#28a745'">
            <i class="bi bi-printer-fill"></i> Generar Reporte
        </a>

        <a type="button" href="{{route('fichafamiliar.edit', ['id'=>$fichasFamiliares->id])}}" class="btn btn-success" style="margin-right: 10px;">
            <i class="bi bi-pencil"></i> Editar</a>

    </div>
@endsection
