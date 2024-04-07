@extends ('Plantillas.Plantilla')
@section('titulo', 'Información de hogar')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <h4 class="font-robo t" style="margin: 0; padding:0" id="formularioModal2">INFORMACIÓN DEL HOGAR</h4>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">


    <form method="POST" action="{{ route('fichafamiliar2.store2') }}" enctype="multipart/form-data">
        @csrf

        <label for="higienicos_sanitarios" style="margin-left: 0;"><b>A. HIGIÉNICOS - SANITARIOS</b></label><br><br>

        <label for="caracteristicas" style="margin-left: 0;"><em><b>1. Características de viviendas</b></em></label><br>
        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;">Techo con materiales de desecho:
                    </label><br>

                    <select class="form-select @error('techo_con_materiales_de_desecho') is-invalid @enderror"
                        name="techo_con_materiales_de_desecho" aria-label="Default select example"
                        id="techo_con_materiales_de_desecho" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                        id="paredes_con_meteriales_de_desechos" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('paredes_con_meteriales_de_desechos')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="piso_de_tierra" style="margin-left: 0;">Piso de tierra:</label><br>
                    <select class="form-select @error('piso_de_tierra') is-invalid @enderror" name="piso_de_tierra"
                        aria-label="Default select example" id="piso_de_tierra" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                    <label for="fogon_sin_chimenea_dentro_de_la_vivienda" style="margin-left: 0;">Fogón sin chimenea dentro
                        de la vivienda:</label><br>
                    <select class="form-select @error('fogon_sin_chimenea_dentro_de_la_vivienda') is-invalid @enderror"
                        name="fogon_sin_chimenea_dentro_de_la_vivienda" aria-label="Default select example"
                        id="fogon_sin_chimenea_dentro_de_la_vivienda" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                        name="criaderos_de_vectores" aria-label="Default select example" id="criaderos_de_vectores"
                        required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('criaderos_de_vectores')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="animales_dentro_de_la_vivienda" style="margin-left: 0;">Animales dentro de la
                        vivienda:</label><br>
                    <select class="form-select @error('animales_dentro_de_la_vivienda') is-invalid @enderror"
                        name="animales_dentro_de_la_vivienda" aria-label="Default select example"
                        id="animales_dentro_de_la_vivienda" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                    <label for="abastecimiento_de_agua" style="margin-left: 0;"><em><b>2. Abastecimiento de
                                agua</b></em></label><br>
                    <select class="form-select @error('abastecimiento_de_agua') is-invalid @enderror"
                        name="abastecimiento_de_agua" aria-label="Default select example" id="abastecimiento_de_agua"
                        required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Pozo_publico">Pozo publico</option>
                        <option value="Pozo_domicilio">Pozo domicilio</option>
                        <option value="Carro_cisterna">Carro cisterna</option>
                        <option value="Corrientes_superficiales">Corrientes superficiales</option>
                        <option value="Llave_publica">Llave publica</option>
                        <option value="Conexion_o_llave_en_domicilio">Conexión o llave en domicilio</option>
                    </select>
                    @error('abastecimiento_de_agua')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="agua_para_consumo" style="margin-left: 0;"><em><b>3. Agua para
                                consumo</b></em></label><br>
                    <select class="form-select @error('agua_para_consumo') is-invalid @enderror" name="agua_para_consumo"
                        aria-label="Default select example" id="agua_para_consumo" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="No_tratado">No tratado</option>
                        <option value="Botellon(agua purificada)">Botellon (agua purificada)</option>
                        <option value="Filtrado">Filtrado</option>
                        <option value="Hervida">Hervida</option>
                        <option value="Clorada">Clorada</option>
                    </select>
                    @error('agua_para_consumo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="eliminacion_de_excretas" style="margin-left: 0;"><em><b>4. Eliminación de
                                excretas</b></em></label><br>
                    <select class="form-select @error('eliminacion_de_excretas') is-invalid @enderror"
                        name="eliminacion_de_excretas" aria-label="Default select example" id="eliminacion_de_excretas"
                        required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Letrina_de_foso_simple">Letrina de foso simple</option>
                        <option value="Inododo_o_servicio_sanitario">Inodoro o servicio sanitario</option>
                        <option value="Letrina_de_cierre_hidraulico">Letrina de cierre hidráulico</option>
                        <option value="Aire_libre">Aire libre</option>
                    </select>
                    @error('eliminacion_de_excretas')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="eliminacion_de_basura" style="margin-left: 0;"><em><b>5. Eliminación de
                                basura</b></em></label><br>
                    <select class="form-select @error('eliminacion_de_basura') is-invalid @enderror"
                        name="eliminacion_de_basura" aria-label="Default select example" id="eliminacion_de_basura"
                        required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Tren_de_aseo">Tren de aseo</option>
                        <option value="La_entierra">La entierra</option>
                        <option value="Quema_de_basura">Quema de basura</option>
                        <option value="Aire_libre">Aire libre</option>
                    </select>
                    @error('eliminacion_de_basura')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <label for="economico" style="margin-left: 0;"><b>B. ECONÓMICO</b></label><br><br>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="energia_electrica" style="margin-left: 0;">Energía eléctrica: </label><br>
                    <select class="form-select @error('energia_electrica') is-invalid @enderror" name="energia_electrica"
                        aria-label="Default select example" id="energia_electrica" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('energia_electrica')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="hacinamiento" style="margin-left: 0;">Hacinamiento: </label><br>
                    <select class="form-select @error('hacinamiento') is-invalid @enderror" name="hacinamiento"
                        aria-label="Default select example" id="hacinamiento" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                    @error('hacinamiento')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="beneficiarios" style="margin-left: 0;">Beneficiarios de bono:</label><br>
                    <select class="form-select @error('beneficiarios') is-invalid @enderror" name="beneficiarios"
                        aria-label="Default select example" id="beneficiarios" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                        <input type="text" class="form-control" id="observaciones1" rows="6"
                            placeholder="Espacio para agregar información adicional"
                        minleigth="3" maxleigth="150">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <div class="mb-3"><br>
                        <p>Aquellos con más de tres personas en promedio por cuarto utilizando para dormir.<br>
                            Materiales de desechos: de lata, tela cartón, estera o caña, plástico u otros materiales de
                            desecho o
                            condiciones precarias; con piso de tierra. Se incluyen las móviles, refigio natural, puente
                            similares.
                            Según la definición de Necesidad Básica insatisfecha (NBI). Especificar en observaciones que
                            características
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


        </div>
        <div class="container " style="text-align:right; margin: top 20px;">
            <div class="row align-items-start">
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div>

            
                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"><i
                            class="fas fa-cancel"></i> Cancelar</a>

                            <a type="reset" href="{{ route('fichafamiliar2.create2') }}" class="btn btn-warning"
                            id="botonL1"><i class="fas fa-eraser"></i> Limpiar </a>
    


                    <button class="btn btn-primary" id="botonS3" href="{{ route('fichafamiliar3.create3') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1" />
                        </svg>
                        Siguiente
                    </button>



                </div>
            </div>
        </div>

    </form>

    @php
        $id = DB::table('hogares')->latest()->value('id');
    @endphp
    <!-- Modal -->
    <div class="modal fade" id="cancelarB" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cancelar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea cancelar lo que esta haciendo?
                </div>

                @php
                    $id = DB::table('hojas')->latest()->value('id');
                @endphp

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form id="form-eliminar-{{ $id }}" action="{{ route('fichafamiliar.eliminar', $id) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Si"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
