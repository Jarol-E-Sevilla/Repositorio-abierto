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

    <form id="formulario-ficha" method="POST" action="{{ route('fichafamiliar.update4', $id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                           value="{{ old('no_mortalidad', $datos->no_mortalidad) }}" >
                    @error('no_mortalidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </th>
                <td>
                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el nombre del fallecito"
                           name="nombre_y_apellido" id="nombre_y_apellido" minlength="3" maxlength="50"
                           value="{{ old('nombre_y_apellido', $datos->nombre_y_apellido) }}" >
                    @error('nombre_y_apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <input class="form-control border-radius-sm" type="number" placeholder="Edad que falleció"
                           name="edad_mortalidad" id="edad_mortalidad"
                           value="{{ old('edad_mortalidad', $datos->edad_mortalidad) }}" >
                    @error('edad_mortalidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <input class="form-control border-radius-sm" type="text" placeholder="Causa de muerte"
                           name="causa" id="causa"
                           value="{{ old('causa', $datos->causa) }}" >
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
                                  placeholder="Espacio para agregar información adicional">{{old('observaciones4', $datos->observaciones4)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

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

        <hr class="m-2" style="border: 0.5px solid rgba(9,102,192,0.6)">
        <div style="text-align: right; margin-top: 20px;">
            <div>
                <a href="/fichafamiliar/{{ $id }}/editar5" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#333'" onmouseout="this.style.backgroundColor='black'">
                    <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> volver
                </a>
                <BUTTON type="submit" class="btn btn-primary">Siguiente</BUTTON>
            </div>
        </div>
    </form>

    <div> <br><br> </div>

@endsection
