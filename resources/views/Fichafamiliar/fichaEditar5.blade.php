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

    <form id="formulario-ficha" method="POST" action="{{ route('fichafamiliar.update5', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h4 class="font-robo t" style="margin: 0; padding:0">5. EVALUACIÓN DE RIESGO</h4>
        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="techo_con_materiales_de_desecho" style="margin-left: 0;"><b>A. Biológicos</b></label><br>

                    <select class="form-select @error('evaluacion_del_riesgo_familiar') is-invalid @enderror"
                            name="evaluacion_del_riesgo_familiar" aria-label="Default select example"
                            id="evaluacion_del_riesgo_familiar" value="{{old('evaluacion_del_riesgo_familiar', $datos->evaluacion_del_riesgo_familiar)}}" required>
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
                            id="higiénicos_sanitarios" value="{{old('higienicos_sanitarios', $datos->higienicos_sanitarios)}}" required>
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
                            id="socio_económico" value="{{old('socio_economico', $datos->socio_economico)}}" required>
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
        <div >
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
                      placeholder="Espacio para agregar información adicional">{{old('observaciones5', $datos->observaciones5)}}</textarea>
        </div>


        <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">
        <div style="text-align: right; margin-top: 20px;">
            <div class="btn-group">
                <button class="btn btn-dark" onclick="redirigirAFichaFormulario()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                    </svg>
                    Volver
                </button>
                <script>
                    const id = '{{ $id }}'; // Obtener el valor de 'id' de la página actual
                </script>
                <script>
                    function redirigirAFichaFormulario() {
                        const url = `/fichaformulario/${id}`; // Construir la URL con el valor de 'id'
                        window.location.href = url; // Redirigir a la URL
                    }
                </script>

                <a href="/fichafamiliar/{{ $id }}/pdf" target="_blank" class="btn btn-success" style="margin-left: 10px; margin-right: 10px;">
                    <i class="fas fa-file-pdf"></i> Generar Reporte
                </a>

                <button type="submit" class="btn btn-primary" onclick="guardarDatos(event)">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar
                </button>
            </div>
            </script>
        </div>

    </form>

    <div> <br><br> </div>

@endsection
