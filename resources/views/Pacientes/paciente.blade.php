@extends('Plantillas.plantilla')
@section('titulo', 'Listado de Pacientes')
@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de Pacientes</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
            <div>
                <div class="form-group">
                    <form action="{{ route('paciente.buscar') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" id="texto" placeholder="Buscar paciente">
                    </form>
                </div>
            </div>
            <div>
                <a type="button" href="{{ route('paciente.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i> Agregar</a>
                <a type="button" href="{{ route('consulta.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i> Consulta</a>
            </div>
        </div>
        <br>

        <table class="table">
            <thead class="table table-dark table-strid" >
            <tr>

                <th scope="col">Nombres</th>
                <th scope="col">Primer_apellido</th>
                <th scope="col">Segundo_apellido</th>
                <th scope="col">Sexo</th>
                <th scope="col">DNI</th>
                <th scope="col">Ver paciente</th>
               

            </tr>
            </thead>
            <tbody>


            @forelse($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nombres }} </td>
                    <td>{{ $paciente->primer_apellido }} </td>
                    <td>{{ $paciente->segundo_apellido }} </td>
                    <td>{{ $paciente->sexo }} </td>
                    <td>{{ $paciente->dni }} </td>
                    <td><a href="{{route('paciente.mostrar', ['id'=>$paciente->id])}}">Ver paciente</a> </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay paciente</td>
                </tr>
            @endforelse

            </tbody>

        </table>

    <nav aria-label="Page navigation example">

        <ul class="pagination justify-content-center">

            @if ($pacientes->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $pacientes->previousPageUrl() }}" aria-label="Página anterior">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $pacientes->lastPage(); $i++)
                <li class="page-item @if ($pacientes->currentPage() == $i) active @endif">
                    <a class="page-link" href="{{ $pacientes->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($pacientes->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $pacientes->nextPageUrl() }}" aria-label="Siguiente">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif

        </ul>
    </nav>

    <script>
        let pacientesOriginales = @json($pacientes);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('paciente.buscar') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        texto: query
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Verificar si se reciben los resultados correctamente
                        let resultados = filtrarYMostrar(data, query);

                        // Insertar los resultados en la tabla
                        document.querySelector('tbody').innerHTML = resultados;

                        // Si no hay resultados, restaurar la tabla original
                        if (data.length === 0) {
                            cargarTablaOriginal();
                        }
                    });
            } else {
                // Si la búsqueda está vacía, restaurar la tabla original
                cargarTablaOriginal();
            }
        });

        // Evitar la recarga de la página al presionar enter en el input
        document.getElementById('texto').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                // Si la búsqueda está vacía, restaurar la tabla original
                if (this.value.trim() === '') {
                    cargarTablaOriginal();
                }
            }
        });

        // Función para cargar la tabla original
        function cargarTablaOriginal() {
            let pacientes = @json($pacientes);
            let tabla = mostrarPacientes(pacientes);
            document.querySelector('tbody').innerHTML = tabla;
        }

        // Función para filtrar y mostrar resultados
        function filtrarYMostrar(data, query) {
            let resultados = '';

            data.forEach(paciente => {
                // Verificar si alguno de los campos contiene la cadena de búsqueda
                if (
                    paciente.nombres.toLowerCase().includes(query) ||
                    paciente.primer_apellido.toLowerCase().includes(query) ||
                    paciente.segundo_apellido.toLowerCase().includes(query) ||
                    paciente.sexo.toLowerCase().includes(query) ||
                    paciente.dni.includes(query)
                ) {
                    resultados += `
                <tr>
                    <td>${paciente.nombres}</td>
                    <td>${paciente.primer_apellido}</td>
                    <td>${paciente.segundo_apellido}</td>
                    <td>${paciente.sexo}</td>
                    <td>${paciente.dni}</td>
                    <td><a href="{{ route('paciente.index') }}/${paciente.id}">Ver paciente</a></td>
                </tr>`;
                }
            });

            return resultados;
        }

        // Llamar a la función para cargar la tabla original al cargar la página
        cargarTablaOriginal();
    </script>

@endsection
        @if ($pacientes->hasMorePages())
            <a href="{{ $pacientes->nextPageUrl() }}">Siguiente</a>
        @endif
    </div>
@endsections
