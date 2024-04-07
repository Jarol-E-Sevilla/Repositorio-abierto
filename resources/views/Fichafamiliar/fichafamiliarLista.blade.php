@extends ('Plantillas.Plantilla')
@section('titulo', 'Ficha Familiar')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de Ficha Familiar</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
        <div>
            <div class="form-group">
                <form action="{{ route('fichaformulario.buscar') }}" method="GET" class="d-flex">
                    <input type="text" name="texto" id="texto" oninput="submitForm()" placeholder="Buscar ficha" value="{{ request('texto') }}">
                    
                </form>
            </div>

            <script>
                function submitForm() {
                    document.querySelector('form').submit();
                }
            </script>
        </div>
        <div>
            <a type="button" href="{{ route('fichaformulario.create') }}" class="btn btn-warning"><i
                    class="bi bi-person-add"></i> Agregar</a>
        </div>
    </div>
    <br>


    <table class="table">
        <thead class="table table-dark table-strid">
            <tr>

                <th scope="col">Nombres del jefe de familia</th>
                <th scope="col">Número de identidad</th>
                <th scope="col">Código</th>
                <th>Ver ficha familiar</th>


            </tr>
        </thead>
        <tbody>

            @forelse($fichasFamiliares as $fichafamiliar)
                <tr>
                    <td>{{ $fichafamiliar->nombre_completo_del_jefe_de_la_familia }}</td>
                    <td>{{ $fichafamiliar->numero_de_identidad_del_jefe_de_la_casa }}</td>
                    <td>{{ $fichafamiliar->codigo }}</td>
                    <td><a href="{{ route('fichafamiliar.mostrar', ['id' => $fichafamiliar->id]) }}">Ver ficha familiar</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay fichas que mostrar</td>
                </tr>
            @endforelse

        </tbody>

    </table>
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($fichasFamiliares->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Anterior</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $fichasFamiliares->appends(request()->input())->previousPageUrl() }}" aria-label="Página anterior">Anterior</a></li>
        @endif

        @for ($i = 1; $i <= $fichasFamiliares->lastPage(); $i++)
            <li class="page-item @if ($fichasFamiliares->currentPage() == $i) active @endif">
                <a class="page-link" href="{{ $fichasFamiliares->appends(request()->input())->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($fichasFamiliares->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $fichasFamiliares->appends(request()->input())->nextPageUrl() }}" aria-label="Siguiente">Siguiente</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
        @endif
    </ul>
</nav>
    <script>
        let fichasFamiliaresOriginales = @json($fichasFamiliares);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('fichaformulario.buscar') }}`, {
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
            let fichasFamiliares = @json($fichasFamiliares);
            let tabla = mostrarfichasFamiliares(fichasFamiliares);
            document.querySelector('tbody').innerHTML = tabla;
        }

        // Función para filtrar y mostrar resultados
        function filtrarYMostrar(data, query) {
            let resultados = '';

            data.forEach(fichafamiliar => {
                // Verificar si alguno de los campos contiene la cadena de búsqueda
                if (
                    fichafamiliar.nombre_completo_del_jefe_de_la_familia.toLowerCase().includes(query) ||
                    fichafamiliar.numero_de_identidad_del_jefe_de_la_casa.includes(query) ||
                    fichafamiliar.codigo.includes(query)
                ) {
                    resultados += `
                <tr>
                    <td>${fichafamiliar.nombre_completo_del_jefe_de_la_familia}</td>
                    <td>${fichafamiliar.numero_de_identidad_del_jefe_de_la_casa}</td>
                    <td>${fichafamiliar.codigo}</td>
                    <td><a href="{{ route('fichaformulario.index') }}/${fichafamiliar.id}">Ver ficha familiar</a></td>
                </tr>`;
                }
            });

            return resultados;
        }

        // Llamar a la función para cargar la tabla original al cargar la página
        cargarTablaOriginal();
    </script>



@endsection
