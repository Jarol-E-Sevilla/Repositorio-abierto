@extends('plantillas.plantilla')

@section('titulo', 'Editar Datos Generales')

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

    <form method="POST" action="{{ route('fichafamiliar.update', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="nombre_del_entrevistador" style="margin-left: 0;">Nombre del entrevistador: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el nombre del entrevistador"
                               name="nombre_del_entrevistador" id="nombre_del_entrevistador" minlength="3" maxlength="80"
                               value="{{ old('nombre_del_entrevistador', $datos->nombre_del_entrevistador) }}" required>
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
                               value="{{ old('fecha_de_entrevista', $datos->fecha_de_entrevista) }}" required>
                        @error('fecha_de_entrevista')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="region_sanitaria" style="margin-left: 0;">Región sanitaria: </label>
                        <input class="form-control border-radius-sm" type="number"
                               name="region_sanitaria" id="region_sanitaria" minlength="1" maxlength="50" placeholder="Ingrese la región sanitaria"
                               value="{{ old('region_sanitaria', $datos->region_sanitaria) }}" required>
                        @error('region_sanitaria')
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
                               value="{{ old('establecimiento_de_salud_sede_del_equipo', $datos->establecimiento_de_salud_sede_del_equipo) }}" required>
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
                               value="{{ old('sector', $datos->sector) }}" required>
                        @error('sector')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-robo form-group">
                        <label for="codigo" style="margin-left: 0;">Código: </label>
                        <input class="form-control border-radius-sm" type="number"
                               name="codigo" id="codigo" minlength="1" maxlength="4" placeholder="Ingrese Código de la ficha familiar"
                               min="0" value="{{ old('codigo', $datos->codigo) }}" required>
                        @error('codigo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Validar la entrada para permitir solo hasta 13 caracteres
                        document.getElementById('codigo').addEventListener('input', function() {
                            if (this.value.length > 4) {
                                this.value = this.value.slice(0, 4); // Limitar a 13 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('codigo').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>
                </div>

            </div>


            <br>

            <h4 class="font-robo t" style="margin: 0; padding:0">1. DATOS GENERALES </h4>
            <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

            <div class="row">
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="numero_de_identidad_del_jefe_de_la_casa" style="margin-left: 0;">Número de identidad del jefe(a) de la familia: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el número de identidad del jefe de la Casa"
                               name="numero_de_identidad_del_jefe_de_la_casa" id="numero_de_identidad_del_jefe_de_la_casa"
                               value="{{ old('numero_de_identidad_del_jefe_de_la_casa', $datos->numero_de_identidad_del_jefe_de_la_casa) }}" required>
                        @error('numero_de_identidad_del_jefe_de_la_casa')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Validar la entrada para permitir solo hasta 13 caracteres
                        document.getElementById('numero_de_identidad_del_jefe_de_la_casa').addEventListener('input', function() {
                            if (this.value.length > 13) {
                                this.value = this.value.slice(0, 13); // Limitar a 13 caracteres
                            }
                        });

                        // Validar la entrada para permitir solo números
                        document.getElementById('numero_de_identidad_del_jefe_de_la_casa').addEventListener('keypress', function(event) {
                            if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                                event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                            }
                        });
                    </script>

                </div>
                <div class="col-4">
                    <div class="font-robo form-group">
                        <label for="numero_de_celular_o_fijo" style="margin-left: 0;">Número de celular o fijo: </label>
                        <input class="form-control border-radius-sm" type="number" placeholder="Ingrece su número"
                               name="numero_de_celular_o_fijo" id="numero_de_celular_o_fijo"
                               value="{{ old('numero_de_celular_o_fijo', $datos->numero_de_celular_o_fijo) }}" required>
                        @error('numero_de_celular_o_fijo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        document.getElementById('numero_de_celular_o_fijo').addEventListener('input', function() {
                            if (this.value.length > 8) {
                                this.value = this.value.slice(0, 8); // Limitar a 13 caracteres
                            }
                        });

                        document.getElementById('numero_de_celular_o_fijo').addEventListener('keypress', function(event) {
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
                               value="{{ old('nombre_completo_del_jefe_de_la_familia', $datos->nombre_completo_del_jefe_de_la_familia) }}" required>
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
                                aria-label="Default select example" id="estado_civil" value="{{ old('estado_civil', $datos->estado_civil) }}" required>
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
                        <label for="numero_de_vivienda" style="margin-left: 0;">Número de vivienda: </label>
                        <input class="form-control border-radius-sm" type="number" placeholder="Número de vivienda"
                               name="numero_de_vivienda" id="numero_de_vivienda" minlength="3" maxlength="10"
                               value="{{ old('numero_de_vivienda', $datos->numero_de_vivienda) }}" required>
                        @error('numero_de_vivienda')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <script>
                            document.getElementById('numero_de_vivienda').addEventListener('input', function() {
                                if (this.value.length > 5) {
                                    this.value = this.value.slice(0, 5); // Limitar a 5 caracteres
                                }
                            });

                            document.getElementById('numero_de_vivienda').addEventListener('keypress', function(event) {
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
                               value="{{ old('Aldea_Caserio_Barrio_Colonia', $datos->Aldea_Caserio_Barrio_Colonia) }}" required>
                        @error('Aldea_Caserio_Barrio_Colonia')
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
                               value="{{ old('referencia_vecinal', $datos->referencia_vecinal) }}" required>
                        @error('referencia_vecinal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="col-4">
                    <div class="font-robo form-group" style="margin-bottom: 5px">
                        <label for="area" style="margin-left: 0;">Área: </label>
                        <select class="form-select @error('area') is-invalid @enderror" name="area"
                                aria-label="Default select example" id="area" value="{{ old('area', $datos->area) }}" required>
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
                               value="{{ old('municipio', $datos->municipio) }}" required>
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
                               name="distancia_en_kilometros" id="distancia_en_kilometros" maxlength="3"
                               value="{{ old('distancia_en_kilometros', $datos->distancia_en_kilometros) }}" required>
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
                        <input class="form-control border-radius-sm" type="string" placeholder="Ingresar numero de horas"
                               name="horas" id="horas" maxlength="2"
                               value="{{ old('horas', $datos->horas) }}" required>
                        @error('horas')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <script>
                        // Validar la entrada para permitir solo hasta 3 dígitos
                        document.getElementById('horas').addEventListener('input', function() {
                            if (this.value.length > 2) {
                                this.value = this.value.slice(0, 2); // Limitar a 3 caracteres
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
                        <input class="form-control border-radius-sm" type="string" placeholder="Ingresar numero de minutos"
                               name="minutos" id="minutos" minlength="2" maxlength="10"
                               value="{{ old('minutos', $datos->minutos) }}" required>
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
                        <label for="nombre_del_establecimiento_mas_cercano" style="margin-left: 0;">Nombre del establecimiento de salud más cercano: </label>
                        <input class="form-control border-radius-sm" type="text" placeholder="Ingresar el nombre del establecimiento más cercano"
                               name="nombre_del_establecimiento_mas_cercano" id="nombre_del_establecimiento_mas_cercano" maxlength="100"
                               value="{{ old('nombre_del_establecimiento_mas_cercano', $datos->nombre_del_establecimiento_mas_cercano) }}" required>
                        @error('nombre_del_establecimiento_mas_cercano')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>


        <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">
        <div>
            <a href="/fichaformulario/{{ $id }}" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#333'" onmouseout="this.style.backgroundColor='black'">
                <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> volver
            </a>
            <BUTTON type="submit" class="btn btn-primary">Siguiente</BUTTON>
        </div>
    </form>

    <div> <br><br> </div>

@endsection
