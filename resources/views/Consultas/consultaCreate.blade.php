@extends('plantillas.plantilla')

@section('titulo', 'Consulta')

@section('contenido')

    <div class="card m-3 p-3">
        <div class="wrapper wrapper--w960">
            <div class="card border-radius-sm border-0" style="">
                <div class="card-body border-radius-sm border-0">
                    <h4 class="font-robo t" style="margin: 0; padding:0">Datos de la Consulta: </h4>
                    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                    <div style="width: 100%; max-width: 1200px; margin: 0 auto;">


                    </div class="row">
                    <div class="row">

                        <div>
                            @if (session('mensaje'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('mensaje') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="card-body border-radius-sm border-0">
                                <form method="POST" action= "{{ route('consulta.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="autocompleteInput" class="form-label">Paciente:</label>
                                            <input type="text" id="autocompleteInput" name="autocompleteInput"
                                                class="form-control" placeholder="Buscar paciente por Identidad"
                                                autocomplete="off" value="{{ old('autocompleteInput') }}">
                                            @error('paciente_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="paciente_id" id="selectedPacienteId"
                                                value="{{ old('paciente_id') }}">

                                            <!-- Lista de usuarios oculta -->
                                            <div style="z-index: 15; position: absolute;">
                                                <ul id="pacientesList" class="list-group"
                                                    style="display: none; cursor: pointer;"></ul>
                                            </div>

                                        </div>

                                        <!-- Nuevo div para mostrar detalles del paciente seleccionado con estilos de Bootstrap -->
                                        <div id="detallesPaciente" class="mt-3 p-3 border rounded"></div>


                                        <script>
                                            const users = {!! json_encode($pacientes) !!};

                                            // Elementos del DOM
                                            const input = document.getElementById('autocompleteInput');
                                            const selectedUserIdInput = document.getElementById('selectedPacienteId');
                                            const userList = document.getElementById('pacientesList');

                                            // Escucha el evento de entrada en el campo de texto
                                            input.addEventListener('input', function() {
                                                selectedUserIdInput.value = "";
                                                const query = input.value;

                                                // Filtra los usuarios que coinciden con la consulta
                                                const filteredUsers = users.filter(user => user.dni.includes(query) ||
                                                    `${user.nombres} ${user.primer_apellido} ${user.segundo_apellido}`.toLowerCase().includes(query
                                                        .toLowerCase())
                                                ).slice(0, 10);

                                                // Muestra la lista de usuarios
                                                displayUserList(filteredUsers);
                                            });

                                            // Muestra la lista de usuarios
                                            function displayUserList(users) {
                                                // Limpia la lista existente
                                                userList.innerHTML = '';

                                                // Muestra la lista de usuarios filtrados
                                                users.forEach(user => {
                                                    const listItem = document.createElement('li');
                                                    listItem.className = 'list-group-item';
                                                    listItem.textContent = user.dni + " " + user.nombres + " " + user.primer_apellido + " " + user
                                                        .segundo_apellido;
                                                    listItem.addEventListener('click', function() {
                                                        // Cuando se hace clic en un usuario, establece la ID en el campo oculto y el valor en el campo de texto
                                                        selectedUserIdInput.value = user.dni;
                                                        input.value = user.dni + " " + user.nombres + " " + user.primer_apellido + " " + user
                                                            .segundo_apellido;
                                                        // Oculta la lista
                                                        userList.style.display = 'none';
                                                        mostrarDetallesPaciente(user);
                                                    });
                                                    userList.appendChild(listItem);
                                                });

                                                // Muestra la lista solo si hay usuarios filtrados
                                                userList.style.display = users.length > 0 ? 'block' : 'none';
                                            }

                                            // Función para mostrar los detalles del paciente seleccionado
                                            function mostrarDetallesPaciente(paciente) {
                                                const detallesPacienteDiv = document.getElementById('detallesPaciente');
                                                detallesPacienteDiv.innerHTML = `
                                                    <p><strong>No. de Identidad:</strong> ${paciente.dni}</p>
                                                    <p><strong>Nombre completo:</strong> ${paciente.nombres + " " + paciente.primer_apellido + paciente
                                                            .segundo_apellido}</p>
                                                    <p><strong>Fecha de nacimiento:</strong> ${paciente.fecha_de_nacimiento}</p>
                                                    <p><strong>Expediente:</strong> ${paciente.expediente}</p>
                                                    <p><strong>Temperatura:</strong> ${paciente.temperatura}</p>
                                                    <p><strong>Sexo:</strong> ${paciente.sexo}</p>
                                                    <p><strong>Peso:</strong> ${paciente.peso}</p>
                                                    <p><strong>Presión arterial:</strong> ${paciente.presion_arterial}</p>
                                                `;
                                            }

                                            // Agrega un evento focus a todos los inputs
                                            var inputs = document.querySelectorAll('input, textarea, select, div, form');
                                            inputs.forEach(function(input) {
                                                input.addEventListener('focus', function() {
                                                    // Oculta la lista cuando se cambia de input
                                                    userList.style.display = 'none';
                                                });
                                            });

                                            document.addEventListener('DOMContentLoaded', function() {
                                                input.addEventListener('keydown', function(event) {
                                                    if (event.key === 'Escape' || event.key === 'Tab') {
                                                        userList.style.display = 'none';
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>



                                    <div class="col-4">
                                        <div class="font-robo form-group">
                                            <label for="autocompleteMedico" style="margin-left: 0;">Seleccione el médico:
                                            </label>
                                            <input type="text" id="autocompleteMedico" name="autocompleteMedico"
                                                class="form-control" placeholder="Buscar médico por nombre"
                                                autocomplete="off" value="{{ old('autocompleteMedico') }}">
                                            <input type="hidden" name="atendido" id="selectedMedicoId"
                                                value="{{ old('atendido') }}">

                                            <!-- Lista de médicos oculta -->
                                            <div style="z-index: 15; position: absolute;">
                                                <ul id="medicosList" class="list-group"
                                                    style="display: none; cursor: pointer;"></ul>
                                            </div>

                                            {{-- <!-- Mostrar información del médico seleccionado -->
                                            <div id="medicoInfo" class="mt-2 p-2 border rounded"
                                                style="background-color: #f8f9fa;"></div> --}}

                                            @error('medico_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <script>
                                        const medicos = {!! json_encode($medicos) !!};

                                        // Elementos del DOM
                                        const inputMedico = document.getElementById('autocompleteMedico');
                                        const selectedMedicoIdInput = document.getElementById('selectedMedicoId');
                                        const medicosList = document.getElementById('medicosList');

                                        // Escucha el evento de entrada en el campo de texto del médico
                                        inputMedico.addEventListener('input', function() {
                                            selectedMedicoIdInput.value = "";
                                            const query = inputMedico.value;

                                            // Filtra los médicos que coinciden con la consulta
                                            const filteredMedicos = medicos.filter(medico => medico.nombres.toLowerCase().includes(query
                                                .toLowerCase())).slice(0, 10);

                                            // Muestra la lista de médicos
                                            displayMedicoList(filteredMedicos);
                                        });

                                        // Muestra la lista de médicos
                                        function displayMedicoList(medicos) {
                                            // Limpia la lista existente
                                            medicosList.innerHTML = '';

                                            // Muestra la lista de médicos filtrados
                                            medicos.forEach(medico => {
                                                const listItem = document.createElement('li');
                                                listItem.className = 'list-group-item';
                                                listItem.textContent = medico.nombres + " " + medico.primer_apellido + " " + medico
                                                    .segundo_apellido;
                                                listItem.addEventListener('click', function() {
                                                    // Cuando se hace clic en un médico, establece la ID en el campo oculto y el valor en el campo de texto
                                                    selectedMedicoIdInput.value = medico.id;
                                                    inputMedico.value = medico.nombres + " " + medico.primer_apellido + " " + medico
                                                        .segundo_apellido;
                                                    // Oculta la lista
                                                    medicosList.style.display = 'none';
                                                });
                                                medicosList.appendChild(listItem);
                                            });

                                            // Muestra la lista solo si hay médicos filtrados
                                            medicosList.style.display = medicos.length > 0 ? 'block' : 'none';
                                        }

                                        // Agrega un evento focus a todos los inputs
                                        var inputs = document.querySelectorAll('input, textarea, select, div, form');
                                        inputs.forEach(function(input) {
                                            input.addEventListener('focus', function() {
                                                // Oculta la lista cuando se cambia de input
                                                medicosList.style.display = 'none';
                                            });
                                        });

                                        document.addEventListener('DOMContentLoaded', function() {
                                            inputMedico.addEventListener('keydown', function(event) {
                                                if (event.key === 'Escape' || event.key === 'Tab') {
                                                    medicosList.style.display = 'none';
                                                }
                                            });
                                        });

                                        function displaySelectedMedicoInfo(medico) {
                                            const medicoInfoDiv = document.getElementById('medicoInfo');
                                            medicoInfoDiv.innerHTML = `
                                                <p>ID: ${medico.id}</p>
                                                <p>Nombre: ${medico.nombres} ${medico.primer_apellido} ${medico.segundo_apellido}</p>
                                                <p>DNI: ${medico.dni}</p>
                                                <p>Fecha de Nacimiento: ${medico.fecha_de_nacimiento}</p>
                                                <!-- Agrega más campos de información del médico si es necesario -->
                                            `;
                                        }
                                    </script>



                                    <div class="col-4">
                                        <div class="font-robo form-group" style="margin-bottom: 5px">
                                            <label for="fecha_visita" style="margin-left: 0;">Fecha de visita: </label>
                                            <input class="form-control border-radius-sm" type="date"
                                                placeholder="Ingrese la fecha de visita" name="fecha_visita"
                                                id="fecha_visita" value="{{ old('fecha_visita', date('Y-m-d')) }}"
                                                max="{{ date('Y-m-d') }}" required>
                                            @error('fecha_visita')
                                                <strong class="menerr" style="color:red">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="font-robo form-group">
                                            <label for="motivo_visita">Motivo para asistir a consulta:</label>
                                            <textarea class="form-control border-radius-sm" id="motivo_visita" name="motivo_visita" placeholder="Ingrese motivo"
                                                minlength="3" maxlength="400" required>{{ old('motivo_visita') }}</textarea>
                                            @error('motivo_visita')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="font-robo form-group">
                                            <label for="motivo_visita">Diagnóstico:</label>
                                            <textarea class="form-control border-radius-sm" id="motivo_visita" name="motivo_visita" placeholder="Ingrese motivo"
                                                minlength="3" maxlength="400" required>{{ old('motivo_visita') }}</textarea>
                                            @error('motivo_visita')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

 <br><br>           
<h4 class="font-robo t" style="margin: 0; padding:0">Datos de ATA </h4>
<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="tPas" style="margin-left: 0;">El paciente es:
                    </label><br>

                    <select class="form-select @error('tPas') is-invalid @enderror"
                        name="tPas" aria-label="Default select example"
                        id="tPas" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="n">Nuevo</option>
                        <option value="s">Subsiguiente</option>
                    </select>
                    @error('tPas')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="considera" style="margin-left: 0;">El paciente se considera:
                    </label><br>

                    <select class="form-select @error('considera') is-invalid @enderror"
                        name="considera" aria-label="Default select example"
                        id="considera" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="<1mN">Menor de 1 mes de 1a vez</option>
                        <option value="<1mS">Menor de 1 mes subsiguiente</option>
                        <option value="1ma1aN">1 mes a 1 año 1a vez </option>
                        <option value="1ma1aS">1 mes a un año subsiguiente </option>
                        <option value="1a4N">1 a 4 años 1a vez</option>
                        <option value="1a4S">1 a 4 años subsiguiente </option>
                        <option value="5a9N">5 a 9 años 1a vez</option>
                        <option value="5a9S">5 a 9 años subsiguiente </option>
                        <option value="10a14N">10 a 14 años 1a vez</option>
                        <option value="10a14S">10 a 14 años subsiguiente </option>
                        <option value="15a19N">15 a 19 años 1a vez</option>
                        <option value="15a19S">15 a 19 años subsiguiente </option>
                        <option value="20a49N">20 a 49 años 1a vez</option>
                        <option value="20a49S">20 a 49 años subsiguiente </option>
                        <option value="50a60N">50 a 59 años 1a </option>
                        <option value="50a60S">50 a 59 años subsiguiente </option>
                        <option value="+60N">60 o mayor a 60 años 1a vez</option>
                        <option value="+60S">60 o mayor a 60 años subsiguiente </option>
                    </select>
                    @error('considera')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="tCon" style="margin-left: 0;">La consulta se considera:
                    </label><br>

                    <select class="form-select @error('tCon') is-invalid @enderror"
                        name="tCon" aria-label="Default select example"
                        id="tCon" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="e">Espontanea</option>
                        <option value="r">Referida</option>
                    </select>
                    @error('tCon')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="deteccion" style="margin-left: 0;">Hubo detección de:
                    </label><br>

                    <select class="form-select @error('deteccion') is-invalid @enderror"
                        name="deteccion" aria-label="Default select example"
                        id="deteccion" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="sr">Síntomas respiratorios</option>
                        <option value="ccu">Cáncer cervico uterino</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                    @error('deteccion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="eCon" style="margin-left: 0;">En caso de embarazo, es:
                    </label><br>

                    <select class="form-select @error('eCon') is-invalid @enderror"
                        name="eCon" aria-label="Default select example"
                        id="eCon" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="econ">Embarazo con control</option>
                        <option value="n">Nuevo</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                    @error('eCon')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="cPu" style="margin-left: 0;">Control puerpal
                    </label><br>

                    <select class="form-select @error('cPu') is-invalid @enderror"
                        name="cPu" aria-label="Default select example"
                        id="cPu" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    @error('cPu')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="altEmb" style="margin-left: 0;">Atención en embarazo (si es el caso):
                    </label><br>

                    <select class="form-select @error('altEmb') is-invalid @enderror"
                        name="altEmb" aria-label="Default select example"
                        id="altEmb" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="12sgN">Atención prenatal nueva en las primeras 12 SG</option>
                        <option value="12sgS">Atención prenatal subsiguiente en las primeras 12 SG</option>
                        <option value="10diasN">Atención puerperal nueva en los primeros 10 días</option>
                        <option value="10diasS">Atención puerperal subsiguiente en los primeros 10 días.  </option>
                        
                    </select>
                    @error('altEmb')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="anticonceptivos" style="margin-left: 0;">Anticonceptivos:
                    </label><br>

                    <select class="form-select @error('anticonceptivos') is-invalid @enderror"
                        name="anticonceptivos" aria-label="Default select example"
                        id="anticonceptivos" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="oral1c">Oral 1 ciclo</option>
                        <option value="oral3c">Oral 3 ciclos </option>
                        <option value="oral6c">Oral 6 ciclos</option>
                        <option value="con10">Condones 10 unidades</option>
                        <option value="con30">Condones 30 unidades  </option>
                        <option value="depo">Depo provera aplicadas</option>
                        <option value="diu">Diu insertado </option>
                        <option value="collar">Utilizando el método de días fijos (collar) </option>
                        <option value="implanon">Implante subdermico  </option>
                    </select>
                    @error('anticonceptivos')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="n1" style="margin-left: 0;">En caso de que el paciente sea niño:
                    </label><br>

                    <select class="form-select @error('n1') is-invalid @enderror"
                        name="n1" aria-label="Default select example"
                        id="n1" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="<5dN">Menor de 5 años con diarrea</option>
                        <option value="<5dS">Menor de 5 años con diarrea que acude a cita de seguimiento </option>
                        <option value="<5des">Menor de 5 años con deshidratación rehidratado en la US</option>
                        <option value="<5neuN">Menor de 5 años con caso de neumonía nuevo en el año</option>
                        <option value="<5ane">Menor de 5 años con con algún grado de síndrome Anémico Diagnosticado por laboratorio</option>
                        <option value="seguimiento">Seguimiento </option>
                        <option value="ninguno">Ninguno</option>
                        
                    </select>
                    @error('n1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="font-robo form-group" style="margin-bottom: 5px">
                    <label for="n2" style="margin-left: 0;">En caso de que el paciente sea niño: (2)
                    </label><br>

                    <select class="form-select @error('n2') is-invalid @enderror"
                        name="n2" aria-label="Default select example"
                        id="n2" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <option value="<5creA">Menor de 5 años con diarreaMenor de 5 años con crecimiento adecuado </option>
                        <option value="<5creI">Menor de 5 años con crecimiento inadecuado </option>
                        <option value="<5bajo">Menor de 5 años con bajo percentil 3</option>
                        <option value="<5dnutri">Menor de 5 años con daño nutricional severo </option>
                        <option value="<5alter">Menor de 5 años con discapacidad nuevo en el año</option>
                        
                    </select>
                    @error('n2')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
        
        



















                                    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                                    <div style="float: right ; margin-top: 5px">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#cancelarB"><i class="fas fa-cancel"></i> Cancelar</button>
                                        <a type="reset" href="{{ route('consulta.create') }} "class="btn btn-warning"><i
                                                class="fas fa-eraser"></i> Limpiar </a>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                            Guardar</button>
                                    </div>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="cancelarB" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Cancelar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Desea cancelar lo que esta haciendo?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <a type="button" href="{{ route('consulta.index') }}"
                                                    class="btn btn-danger">Si</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endsection
