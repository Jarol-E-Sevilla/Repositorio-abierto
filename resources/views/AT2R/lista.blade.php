@extends ('Plantillas.Plantilla')
@section('titulo', 'Lista de AT2Rs')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de At2r</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
        <div>
            <div class="form-group">
                <form action="{{ route('at2r.buscar') }}" method="GET" class="d-flex">
                    <input type="text" name="busqueda" id="busqueda" oninput="submitForm()" placeholder="Buscar At2r por Id"
                           value="{{ request('busqueda') }}">
                    <input type="date" name="desde" id="desde" oninput="submitForm()" value="{{ request('desde', Carbon\Carbon::now()->subMonth()->toDateString()) }}">
                    <input type="date" name="hasta" id="hasta" oninput="submitForm()" value="{{ request('hasta', Carbon\Carbon::now()->toDateString()) }}">
                </form>
            </div>

            <script>
                function submitForm() {
                    document.querySelector('form').submit();
                }
            </script>
        </div>
        <div>
            <a type="button" href="{{ route('at2r.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i>
                Agregar</a>
        </div>
    </div>
    <br>


    <table class="table">
        <thead class="table table-dark table-strid">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Fecha At2r</th>
                <th>Ver At2r</th>
            </tr>
        </thead>
        <tbody>

            @forelse($at2rs as $at2r)
                <tr>
                    <td>{{ $at2r->id }}</td>
                    <td>{{ $at2r->created_at }}</td>
                    <td><a href="{{route('at2r.mostrarindividual', ['id'=>$at2r->id])}}">Ver AT2R</a> </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay consultas que mostrar</td>
                </tr>
            @endforelse

        </tbody>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($at2rs->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link"
                        href="{{ $at2rs->appends(request()->input())->previousPageUrl() }}"
                        aria-label="Página anterior">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $at2rs->lastPage(); $i++)
                <li class="page-item @if ($at2rs->currentPage() == $i) active @endif">
                    <a class="page-link"
                        href="{{ $at2rs->appends(request()->input())->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($at2rs->hasMorePages())
                <li class="page-item"><a class="page-link"
                        href="{{ $at2rs->appends(request()->input())->nextPageUrl() }}"
                        aria-label="Siguiente">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif
        </ul>
    </nav>




@endsection
