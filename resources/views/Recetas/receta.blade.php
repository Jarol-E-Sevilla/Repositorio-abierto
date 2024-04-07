@extends ('Plantillas.Plantilla')
@section('titulo', 'Receta')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de Receta</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
        <div>
            <div class="form-group">
                <form action="{{ route('receta.buscar') }}" method="GET" class="d-flex">
                    <input type="text" name="texto" id="texto" oninput="submitForm()" placeholder="Buscar receta" value="{{ request('texto') }}">
                    
                </form>
            </div>

            <script>
                function submitForm() {
                    document.querySelector('form').submit();
                }
            </script>
        </div>
        <div>
            <a type="button" href="{{ route('receta.create') }}" class="btn btn-warning"><i
                    class="bi bi-person-add"></i> Agregar</a>
        </div>
    </div>
    <br>


    <table class="table">
        <thead class="table table-dark table-strid">
            <tr>

                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th>Ver Receta</th>


            </tr>
        </thead>
        <tbody>

            @forelse($recetas as $receta)
                <tr>
                    <td>{{ $receta->nombre }}</td>
                    <td>{{ $receta->fecha }}</td>
                    <td><a href="{{ route('receta.mostrar', ['id' => $receta->id]) }}">Ver receta</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay receta que mostrar</td>
                </tr>
            @endforelse

        </tbody>

    </table>
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($recetas->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Anterior</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $recetas->appends(request()->input())->previousPageUrl() }}" aria-label="Página anterior">Anterior</a></li>
        @endif

        @for ($i = 1; $i <= $recetas->lastPage(); $i++)
            <li class="page-item @if ($recetas->currentPage() == $i) active @endif">
                <a class="page-link" href="{{ $recetas->appends(request()->input())->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($recetas->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $recetas->appends(request()->input())->nextPageUrl() }}" aria-label="Siguiente">Siguiente</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
        @endif
    </ul>
</nav>
    <script>
        let recetasOriginales = @json($recetas);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('receta.buscar') }}`, {
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
            let recetas = @json($recetas);
            let tabla = mostrarrecetas(recetas);
            document.querySelector('tbody').innerHTML = tabla;
        }

        // Función para filtrar y mostrar resultados
        function filtrarYMostrar(data, query) {
            let resultados = '';

            data.forEach($receta => {
                // Verificar si alguno de los campos contiene la cadena de búsqueda
                if (
                    receta.nombre.toLowerCase().includes(query) ||
                    receta.fecha.includes(query) ||
                  
                ) {
                    resultados += `
                <tr>
                    <td>${receta.nombre}</td>
                    <td>${receta.fecha}</td>
                 
                    <td><a href="{{ route('receta.index') }}/${receta.id}">Ver receta</a></td>
                </tr>`;
                }
            });

            return resultados;
        }

        // Llamar a la función para cargar la tabla original al cargar la página
        cargarTablaOriginal();
    </script>



@endsection
