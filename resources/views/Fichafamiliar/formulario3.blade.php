@extends ('Plantillas.Plantilla')
@section('titulo', 'Agregar Miembros')

@section('contenido')

    <h4 class="font-robo t" style="margin: 0; padding:0">AGREGAR INFORMACIÓN DE UN MIEMBRO FAMILIAR</h4>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

    <form method="POST" action="{{ route('fichafamiliar3.store3') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="nombres_y_apellidos" style="margin-left: 0;">Nombres y apellidos </label>
                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese los nombres y apellidos del miembro" name="nombres_y_apellidos"
                        id="nombres_y_apellidos" minlength="3" maxlength="50" value="{{ old('nombres_y_apellidos') }}"
                        required>
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
                        value="{{ old('No_identidad') }}" required>
                    @error('No_identidad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <script>
                // Validar la entrada para permitir solo hasta 13 caracteres
                document.getElementById('No_identidad').addEventListener('input', function() {
                    if (this.value.length > 13) {
                        this.value = this.value.slice(0, 13); // Limitar a 13 caracteres
                    }
                });

                // Validar la entrada para permitir solo números
                document.getElementById('No_identidad').addEventListener('keypress', function(event) {
                    if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                        event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                    }
                });
            </script>

            <div class="col-4">

                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="sexo" style="margin-left: 0;">Sexo </label><br>
                    <select class="form-select @error('sexo') is-invalid @enderror" name="sexo"
                        aria-label="Default select example" id="sexo" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="F">Masculino</option>
                        <option value="M">Femenino</option>
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
                        name="parentesco" id="parentesco" minlength="3" maxlength="50" value="{{ old('parentesco') }}"
                        required>
                    @error('parentesco')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="fecha_de_nacimiento" style="margin-left: 0;">Fecha de nacimiento</label>
                    <input class="form-control border-radius-sm" type="date" placeholder="Ingrese la fecha de nacimiento"
                        name="fecha_de_nacimiento" id="fecha_de_nacimiento" minlength="3" maxlength="50"
                        value="{{ old('fecha_de_nacimiento') }}" required>
                    @error('fecha_de_nacimiento')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="edad" style="margin-left: 0;">Edad</label>
                    <input class="form-control border-radius-sm" type="number" placeholder="Ingrese su edad" name="edad"
                        id="edad" min="0" minlength="3" maxlength="50" value="{{ old('edad') }}" required>
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
                        name="etnia" id="etnia" minlength="3" maxlength="50" value="{{ old('etnia') }}" required>
                    @error('etnia')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="escolaridad" style="margin-left: 0;">Escolaridad</label>
                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese grado de escolaridad" name="escolaridad" id="escolaridad" minlength="3"
                        maxlength="50" value="{{ old('escolaridad') }}" required>
                    @error('escolaridad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">

                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="trabaja_actualmente" style="margin-left: 0;">Trabaja actualmente</label><br>
                    <select class="form-select @error('trabaja_actualmente') is-invalid @enderror"
                        name="trabaja_actualmente" aria-label="Default select example" id="trabaja_actualmente" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                        name="ocupacion" id="ocupacion" minlength="3" maxlength="50" value="{{ old('ocupacion') }}"
                        required>
                    @error('ocupacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="vacuna_completa" style="margin-left: 0;">Vacunación completa</label><br>
                    <select class="form-select @error('vacuna_completa') is-invalid @enderror" name="vacuna_completa"
                        aria-label="Default select example" id="vacuna_completa" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('vacuna_completa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <div class="col-4">
                <div class="font-robo form-group">
                    <label for="riesgos" style="margin-left: 0;">Clasificación de grupos de riesgo</label>
                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese riesgo al que pertenece" name="riesgos" id="riesgos" minlength="3"
                        maxlength="50" value="{{ old('riesgos') }}" required>
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
                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Ingrese la planificación familiar" name="PF" id="PF" minlength="3"
                        maxlength="50" value="{{ old('PF') }}" required>
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
                        maxlength="50" value="{{ old('GR') }}" required>
                    @error('GR')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">


                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="tratamiento_para_enf_cronica" style="margin-left: 0;">Tratamiento para enfermedad
                        crónica</label><br>
                    <select class="form-select @error('tratamiento_para_enf_cronica') is-invalid @enderror"
                        name="tratamiento_para_enf_cronica" aria-label="Default select example"
                        id="tratamiento_para_enf_cronica" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
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
                    <label for="No_dependientes" style="margin-left: 0;">Número de Dependientes</label>
                    <input class="form-control border-radius-sm" type="number"
                        placeholder="Ingrese el número de dependientes" name="No_dependientes" id="No_dependientes"
                        min="0" value="{{ old('No_dependientes') }}" required>
                    @error('No_dependientes')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="font-robo form-group">
                    <label for="nombre_del_medicamento_para_enfermedad_cronica" style="margin-left: 0;">Nombre del
                        medicamento para enfermedad crónica</label>
                    <input class="form-control border-radius-sm" type="text"
                        placeholder="Escriba el nombre del medicamento"
                        name="nombre_del_medicamento_para_enfermedad_cronica"
                        id="nombre_del_medicamento_para_enfermedad_cronica" minlength="3" maxlength="50"
                        value="{{ old('nombre_del_medicamento_para_enfermedad_cronica') }}" required>
                    @error('nombre_del_medicamento_para_enfermedad_cronica')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-8">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <div class="mb-3">
                        <label for="observaciones2" class="form-label"><em>Observaciones: </em></label>
                            <input type="text" class="form-control" id="observaciones2" rows="4"
                            placeholder="Espacio para agregar información adicional"
                        minleigth="3" maxleigth="150">
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <div class="mb-3">


                    </div>
                </div>
            </div>
        </div>

        <div class="container " style="text-align:right; margin: top 20px;">
            <div class="row align-items-start">
                <div class="col">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Información
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 90%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: left;">

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
                                                    <li>Trabajadores de los servicios de restauración, personales,
                                                        protección y vendedores de los comercios.</li>
                                                    <li>Trabajadores clasificados en la agricultura y en la pesca.</li>
                                                    <li>Artesanos y trabajadores clasificados de las industrias
                                                        manufactureras, la construcción, y la minería
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



                                    <p><b>Riesgos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gr:
                                        </b>Grupo de Riesgo.</p>

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
                                                    <li>Hijo de madre infectada por VIH que no recibe leche artificial
                                                        (menos de 1 año).</li>
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
                                        <li>De encontrar en los miembros de la familia condiciones no especificadas, como
                                            ser: otras enfermedades crónicas,
                                            enfermedades odontológicas, comportamientos inadecuados, antecedentes alérgicos,
                                            riesgos en el trabajo u otros riesgos,
                                            por favor, especificar en OBSERVACIONES.
                                        </li>
                                        <li>Hijo/a de madre infectada por VIH no debe recibir lactancia materna.
                                        </li>
                                    </ul>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                  

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"><i
                            class="fas fa-cancel"></i> Cancelar</button>

                            <a type="reset" href="{{ route('fichafamiliar3.create3') }}" class="btn btn-warning"
                            id="botonL1"><i class="fas fa-eraser"></i> Limpiar </a>

                    <button class="btn btn-primary" id="botonS3" href="{{ route('fichafamiliar4.create4') }}">
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

                <form id="form-eliminar-{{ $id }}" action="{{ route('fichafamiliar.eliminar', $id) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Si"></input>

                </form>
            </div>
        </div>
    </div>

@endsection
