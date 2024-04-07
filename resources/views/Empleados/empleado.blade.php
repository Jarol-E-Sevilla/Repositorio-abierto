@extends('Plantillas.plantilla')
@section('titulo', 'Listado de Empleado')
@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de empleados</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
            <div>
                <div class="form-group">
                    <form action="{{ route('empleado.buscar') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" id="texto" placeholder="Buscar Empleado...">
                    </form>
                </div>
            </div>
            <div>
                <a type="button" href="{{ route('empleado.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i> Agregar</a>
            </div>
        </div>
        <br>

        <table class="table">
            <thead class="table table-dark table-strid" >
            <tr>

                <th scope="col">Nombres</th>
                <th scope="col">primer_apellido</th>
                <th scope="col">segundo_apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ver empleado</th>

            </tr>
            </thead>
            <tbody>


            @forelse($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nombres }} </td>
                    <td>{{ $empleado->primer_apellido }} </td>
                    <td>{{ $empleado->segundo_apellido }} </td>
                    <td>{{ $empleado->dni }} </td>
                    <td>{{ $empleado->telefono  }} </td>
                    <td><a href="{{route('empleado.mostrar', ['id'=>$empleado->id])}}">ver empleado</a> </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay empleados</td>
                </tr>
            @endforelse

            </tbody>

        </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($empleados->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $empleados->appends(request()->input())->previousPageUrl() }}" aria-label="Página anterior">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $empleados->lastPage(); $i++)
                <li class="page-item @if ($empleados->currentPage() == $i) active @endif">
                    <a class="page-link" href="{{ $empleados->appends(request()->input())->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($empleados->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $empleados->appends(request()->input())->nextPageUrl() }}" aria-label="Siguiente">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif
        </ul>
    </nav>

    <script>
        let empleadosOriginales = @json($empleados);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('empleado.buscar') }}`, {
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
            let empleados = @json($empleados);
            let tabla = mostrarEmpleados(empleados);
            document.querySelector('tbody').innerHTML = tabla;
        }

        // Función para filtrar y mostrar resultados
        function filtrarYMostrar(data, query) {
            let resultados = '';

            data.forEach(empleado => {
                // Verificar si alguno de los campos contiene la cadena de búsqueda
                if (
                    empleado.nombres.toLowerCase().includes(query) ||
                    empleado.primer_apellido.toLowerCase().includes(query) ||
                    empleado.segundo_apellido.toLowerCase().includes(query) ||
                    empleado.dni.includes(query)
                ) {
                    resultados += `
                <tr>
                    <td>${empleado.nombres}</td>
                    <td>${empleado.primer_apellido}</td>
                    <td>${empleado.segundo_apellido}</td>
                    <td>${empleado.dni}</td>
                    <td>${empleado.telefono}</td>
                    <td><a href="{{ route('empleado.index') }}/${empleado.id}">ver empleado</a></td>
                </tr>`;
                }
            });

            return resultados;
        }

        // Llamar a la función para cargar la tabla original al cargar la página
        cargarTablaOriginal();
    </script>

@endsection
