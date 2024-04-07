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


    <h4 class="font-robo t" style="margin: 0; padding:0">2. INFORMACION DE HOGAR</h4>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <form method="POST" action="{{ route('fichafamiliar.update2', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="establecimientoName" style="margin-left: 0;"><b>A. HIGIÉNICOS - SANITARIOS</b></label><br><br>

        <label for="establecimientoName" style="margin-left: 0;"><em><b>1. Características de viviendas</b></em></label><br>
        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;">Techo con materiales de desecho: </label><br>
                    <select class="form-select @error('techo_con_materiales_de_desecho') is-invalid @enderror"
                            name="techo_con_materiales_de_desecho" aria-label="Default select example" id="techo_con_materiales_de_desecho"
                            value="{{old('techo_con_materiales_de_desecho',$datos->techo_con_materiales_de_desecho)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->techo_con_materiales_de_desecho == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->techo_con_materiales_de_desecho == 'no') selected @endif>No</option>
                    </select>
                    @error('techo_con_materiales_de_desecho')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="paredes_con_meteriales_de_desechos" style="margin-left: 0;">Paredes con materiales de
                        desechos: </label><br>
                    <select class="form-select @error('paredes_con_meteriales_de_desechos') is-invalid @enderror"
                            name="paredes_con_meteriales_de_desechos" aria-label="Default select example"
                            id="paredes_con_meteriales_de_desechos" value="{{old('paredes_con_meteriales_de_desechos',$datos->paredes_con_meteriales_de_desechos)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->paredes_con_meteriales_de_desechos == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->paredes_con_meteriales_de_desechos == 'no') selected @endif>No</option>
                    </select>
                    @error('paredes_con_meteriales_de_desechos')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="piso_de_tierra" style="margin-left: 0;">Piso de tierra:</label><br>
                    <select class="form-select @error('piso_de_tierra') is-invalid @enderror"
                            name="piso_de_tierra" aria-label="Default select example"
                            id="piso_de_tierra" value="{{old('piso_de_tierra',$datos->piso_de_tierra)}}" required>
                        <option value="" disabled>Seleccionar</option>
                        <option value="si" @if($datos->piso_de_tierra == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->piso_de_tierra == 'no') selected @endif>No</option>
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
                    <label for="fogon_sin_chimenea_dentro_de_la_vivienda" style="margin-left: 0;">Fogón sin chimenea dentro de la vivienda:</label><br>
                    <select class="form-select @error('fogon_sin_chimenea_dentro_de_la_vivienda') is-invalid @enderror"
                            name="fogon_sin_chimenea_dentro_de_la_vivienda" aria-label="Default select example"
                            id="fogon_sin_chimenea_dentro_de_la_vivienda" value="{{old('fogon_sin_chimenea_dentro_de_la_vivienda', $datos->fogon_sin_chimenea_dentro_de_la_vivienda)}}" required >
                        <option value="" selected >Seleccionar</option>
                        <option value="si" @if($datos->fogon_sin_chimenea_dentro_de_la_vivienda == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->fogon_sin_chimenea_dentro_de_la_vivienda == 'no') selected @endif>No</option>
                    </select>
                    @error('fogon_sin_chimenea_dentro_de_la_vivienda')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="criaderos_de_vectores" style="margin-left: 0;">Criaderos de vectores: </label><br>
                    <select class="form-select @error('criaderos_de_vectores') is-invalid @enderror"
                            name="criaderos_de_vectores" aria-label="Default select example"
                            id="criaderos_de_vectores" value="{{old('criaderos_de_vectores', $datos->criaderos_de_vectores)}}" required >
                        <option value="" selected >Seleccionar</option>
                        <option value="si" @if($datos->criaderos_de_vectores == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->criaderos_de_vectores == 'no') selected @endif>No</option>
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
                            id="animales_dentro_de_la_vivienda"  value="{{old('animales_dentro_de_la_vivienda', $datos->animales_dentro_de_la_vivienda)}}" required >
                        <option value="" selected >Seleccionar</option>
                        <option value="si" @if($datos->animales_dentro_de_la_vivienda == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->animales_dentro_de_la_vivienda == 'no') selected @endif>No</option>
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
                            id="abastecimiento_de_agua" value="{{old('abastecimiento_de_agua', $datos->abastecimiento_de_agua)}}" required >
                        <option value="" selected >Seleccionar</option>
                        <option value="Pozo_publico" @if($datos->abastecimiento_de_agua == 'Pozo_publico') selected @endif>Pozo público</option>
                        <option value="Pozo_domicilio" @if($datos->abastecimiento_de_agua == 'Pozo_domicilio') selected @endif>Pozo domicilio</option>
                        <option value="Carro_cisterna" @if($datos->abastecimiento_de_agua == 'Carro_cisterna') selected @endif>Carro cisterna</option>
                        <option value="Corrientes_superficiales" @if($datos->abastecimiento_de_agua == 'Corrientes_superficiales') selected @endif>Corrientes superficiales</option>
                        <option value="Llave_publica" @if($datos->abastecimiento_de_agua == 'Llave_publica') selected @endif>Llave pública</option>
                        <option value="Conexion_o_llave_en_domicilio" @if($datos->abastecimiento_de_agua == 'Conexion_o_llave_en_domicilio') selected @endif>Conexión o llave en domicilio</option>
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
                            id="agua_para_consumo" value="{{old('agua_para_consumo', $datos->agua_para_consumo)}}" required>
                        <option value="" selected>Seleccionar</option>
                        <option value="No_tratado" @if($datos->agua_para_consumo == 'No_tratado') selected @endif>No tratado</option>
                        <option value="Botellon(agua purificada)" @if($datos->agua_para_consumo == 'Botellon(agua purificada)') selected @endif>Botellón (agua purificada)</option>
                        <option value="Filtrado" @if($datos->agua_para_consumo == 'Filtrado') selected @endif>Filtrado</option>
                        <option value="Hervida" @if($datos->agua_para_consumo == 'Hervida') selected @endif>Hervida</option>
                        <option value="Clorada" @if($datos->agua_para_consumo == 'Clorada') selected @endif>Clorada</option>
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
                            id="eliminacion_de_excretas" value="{{old('eliminacion_de_excretas', $datos->eliminacion_de_excretas)}}" required >
                        <option value="" selected >Seleccionar</option>
                        <option value="Letrina_de_foso_simple" @if($datos->eliminacion_de_excretas == 'Letrina_de_foso_simple') selected @endif>Letrina de foso simple</option>
                        <option value="Inododo_o_servicio_sanitario" @if($datos->eliminacion_de_excretas == 'Inododo_o_servicio_sanitario') selected @endif>Inodoro o servicio sanitario</option>
                        <option value="Letrina_de_cierre_hidraulico" @if($datos->eliminacion_de_excretas == 'Letrina_de_cierre_hidraulico') selected @endif>Letrina de cierre hidráulico</option>
                        <option value="Aire_libre" @if($datos->eliminacion_de_excretas == 'Aire_libre') selected @endif>Aire libre</option>
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
                            id="eliminacion_de_basura" value="{{old('eliminacion_de_basura', $datos->eliminacion_de_basura)}}" required>
                        <option value="" selected >Seleccionar</option>
                        <option value="Tren_de_aseo" @if($datos->eliminacion_de_basura == 'Tren_de_aseo') selected @endif>Tren de aseo</option>
                        <option value="La_entierra" @if($datos->eliminacion_de_basura == 'La_entierra') selected @endif>La entierra</option>
                        <option value="Quema_de_basura" @if($datos->eliminacion_de_basura == 'Quema_de_basura') selected @endif>Quema de basura</option>
                        <option value="Aire_libre" @if($datos->eliminacion_de_basura == 'Aire_libre') selected @endif>Aire libre</option>
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
                            id="energía_eléctrica" value="{{old('energia_electrica', $datos->energia_electrica)}}" required>
                        <option value="" selected>Seleccionar</option>
                        <option value="si" @if($datos->energia_electrica == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->energia_electrica == 'no') selected @endif>No</option>
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
                            id="hacinamiento" value="{{old('hacinamiento', $datos->hacinamiento)}}" required>
                        <option value="" selected>Seleccionar</option>
                        <option value="si" @if($datos->hacinamiento == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->hacinamiento == 'no') selected @endif>No</option>
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
                            id="beneficiarios" value="{{old('beneficiarios', $datos->beneficiarios)}}" required >
                        <option value="" selected>Seleccionar</option>
                        <option value="si" @if($datos->beneficiarios == 'si') selected @endif>Sí</option>
                        <option value="no" @if($datos->beneficiarios == 'no') selected @endif>No</option>
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
                                  placeholder="Espacio para agregar información adicional" >{{old('observaciones1', $datos->observaciones1)}}</textarea>
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
        <div>
            <a href="/fichafamiliar/{{ $id }}/editar" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#333'" onmouseout="this.style.backgroundColor='black'">
                <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> volver
            </a>
            <BUTTON type="submit" class="btn btn-primary">Siguiente</BUTTON>
        </div>
    </form>
    <div> <br><br> </div>

@endsection
