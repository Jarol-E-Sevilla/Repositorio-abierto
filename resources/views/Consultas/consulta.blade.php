@extends ('Plantillas.Plantilla')
@section('titulo', 'Consulta')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de consulta</h1>

    <div class="contenedor d-flex justify-content-between align-items-center ">
        <div>
            <div class="form-group">
                <form action="{{ route('consulta.buscar') }}" method="GET" class="d-flex">
                    <input type="text" name="busqueda" id="busqueda" oninput="handleInput()" placeholder="Buscar consulta"
                        value="{{ request('busqueda') }}">

                    <div class="ml-3"> <!-- Agregamos una clase de margen a la izquierda -->
                        <label style="margin-left: 40px;" for="desde">desde</label>
                        <input type="date" name="desde" id="desde" onchange="handleInput()"
                            value="{{ request('desde', Carbon\Carbon::now()->subMonth()->toDateString()) }}">
                        <label for="hasta">hasta</label>
                        <input type="date" name="hasta" id="hasta" onchange="handleInput()"
                            value="{{ request('hasta', Carbon\Carbon::now()->toDateString()) }}">
                    </div>
                </form>
            </div>

            <script>
                let timeoutId;

                function handleInput() {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function() {
                        document.querySelector('form').submit();
                    }, 2000);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const inputBusqueda = document.getElementById('busqueda');

                    // Enfoca el elemento de entrada
                    inputBusqueda.focus();

                    // Mueve el cursor al final del texto
                    inputBusqueda.setSelectionRange(inputBusqueda.value.length, inputBusqueda.value.length);
                });
            </script>
        </div>
        <div>
            <a type="button" href="{{ route('consulta.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i>
                Agregar</a>
        </div>
    </div>
    <br>


    <table class="table">
        <thead class="table table-dark table-strid">
            <tr>

                <th scope="col">No.</th>
                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
                <th scope="col">Fecha visita</th>
                <th>Ver consulta</th>


            </tr>
        </thead>
        <tbody>

            @php
                $fila = 1;
            @endphp
            @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $fila }}</td>
                    <td>{{ $consulta->paciente->nombres }}</td>
                    <td>{{ $consulta->paciente->dni }}</td>
                    <td>{{ $consulta->fecha_visita }}</td>
                    <td><a href="{{ route('consulta.mostrar', ['id' => $consulta->id]) }}">Ver consulta</a></td>
                </tr>
                @php
                    $fila++;
                @endphp
            @empty
                <tr>
                    <td colspan="4">No hay consultas que mostrar</td>
                </tr>
            @endforelse


        </tbody>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($consultas->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link"
                        href="{{ $consultas->appends(request()->input())->previousPageUrl() }}"
                        aria-label="Página anterior">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $consultas->lastPage(); $i++)
                <li class="page-item @if ($consultas->currentPage() == $i) active @endif">
                    <a class="page-link"
                        href="{{ $consultas->appends(request()->input())->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($consultas->hasMorePages())
                <li class="page-item"><a class="page-link"
                        href="{{ $consultas->appends(request()->input())->nextPageUrl() }}"
                        aria-label="Siguiente">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif
        </ul>
    </nav>
    <script>
        let consultasOriginales = @json($consultas);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('consulta.buscar') }}`, {
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



    @endsection
