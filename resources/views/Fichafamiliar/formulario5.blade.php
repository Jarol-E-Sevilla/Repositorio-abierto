@extends ('Plantillas.Plantilla')
@section('titulo', 'Evaluación de riesgo')

@section('contenido')

    <form method="POST" action="{{ route('fichafamiliar5.store5') }}" enctype="multipart/form-data">
        @csrf
        <h4 class="font-robo t" style="margin: 0; padding:0">EVALUACIÓN DE RIESGO</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>A. Biológicos</b></label><br>

                    <select class="form-select @error('evaluacion_del_riesgo_familiar') is-invalid @enderror"
                        name="evaluacion_del_riesgo_familiar" aria-label="Default select example"
                        id="evaluacion_del_riesgo_familiar" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Grupo_I_de_riesgo">I. El(los) miembro(s) está(n) en el grupo IV de riesgo.</option>
                        <option value="Grupo_II_de_riesgo">II. El(los) miembro(s) está(n) en el grupo III de riesgo.
                        </option>
                        <option value="Grupo_III_de_riesgo">III. El(los) miembro(s) está(n) en el grupo II de riesgo.
                        </option>
                        <option value="Grupo_IV_de_riesgo">IV. El(los) miembro(s) está(n) en el grupo I de riesgo.</option>
                    </select>
                    @error('evaluacion_del_riesgo_familiar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>B. Higiénicos -
                            Sanitarios</b></label><br>

                    <select class="form-select @error('higienicos_sanitarios') is-invalid @enderror"
                        name="higienicos_sanitarios" aria-label="Default select example" id="higienicos_sanitarios"
                        required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Con_dos_o_mas_condiciones_inadecuadas">I. Con dos(2) o más condiciones
                            inadecuadas(según sección No 2).</option>
                        <option value="Con_una_condicion_inadecuada">II. Con una(1) o más condición inadecuadas(según
                            sección No 2).</option>
                        <option value="Con_tres_condiciones_inadecuadas">III. Con ninguna condición inadecuada(según sección
                            No 2).</option>
                        <option value="Esta_en_condicion_inadecuada">IV. Está en otra condición inadecuada. </option>
                    </select>
                    @error('higienicos_sanitarios')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>C.
                            Socio-económicos</b></label><br>

                    <select class="form-select @error('socio_economico') is-invalid @enderror" name="socio_economico"
                        aria-label="Default select example" id="socio_economico" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="La_vivienda_tiene_caracteristicas_fisicas_inadecuadas">I. La vivienda tienen
                            características físicas no adecuadas. </option>
                        <option value="La_vivienda_tiene_servicios_inadecuados">II. La vivienda tiene servicios inadecuados.
                        </option>
                        <option value="El_hogar_se_encuentra_en_estado_de_hacinamiento_critico">III. En el hogar existen
                            niños(as) que no asisten a la escuela(6 a 12 años).</option>
                        <option value="En_el_hogar_existen_niños_que_no_asisten_a_la_escuela">IV. El hogar tienen una alta
                            dependencia económica.</option>
                    </select>
                    @error('socio_economico')
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
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <select class="form-select @error('el_hogar_tiene_una_alta_dependencia_economica') is-invalid @enderror"
                        name="el_hogar_tiene_una_alta_dependencia_economica" aria-label="Default select example"
                        id="el_hogar_tiene_una_alta_dependencia_economica" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="Hogar_pobre">Hogar pobre.</option>
                        <option value="Vivienda_tiene_servicios_inadecuados">Hogar con extrema pobreza.</option>
                        <option value="Ninguno">Ninguno.</option>
                    </select>
                    @error('el_hogar_tiene_una_alta_dependencia_economica')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>




        <p><b>Necesidades Básicas Isatisfechas (NBI)</b></p>
        <p>La definicion establece a un hogar com pobre si se presenta una de las condiciones,
            o en situación de extrema pobreza si presenta dos o más condiciones de las de C. Socio-económica.
        </p>

        <div class="mb-3 col-12">
            <label for="observaciones5" class="form-label"><em>Observaciones: </em></label>
                <input type="text" class="form-control" id="observaciones4" rows="5"
                            placeholder="Espacio para agregar información adicional"
                        minleigth="3" maxleigth="150">
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#cancelarB"><i class="fas fa-cancel"></i> Cancelar</button>
                      

                    <a type="reset" href="{{ route('fichafamiliar5.create5') }}" class="btn btn-warning"
                    id="botonL1"><i class="fas fa-eraser"></i> Limpiar </a>

                    <button type="submit" class="btn btn-success" id="botonS5"><i class="fas fa-save"></i>
                        Guardar</button>

                       
                </div>
            </div>
        </div>


    </form>



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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    
                    @php
                        $id = DB::table('hojas')->latest()->value('id');
                    @endphp

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
