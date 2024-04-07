@extends ('Plantillas.Plantilla')
@section('titulo', 'Mortalidad')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif






    <form method="POST" action="{{ route('fichafamiliar4.store4') }}" enctype="multipart/form-data" id="formulario4" onsubmit="return validarFormulario();">

        @csrf

        <h4 class="font-robo t" style="margin: 0; padding:0"> MORTALIDAD EN EL ÚLTIMO AÑO</h4>
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
                            name="no_mortalidad" id="no_mortalidad" min="1" value="{{ old('no_mortalidad') }}" >
                        @error('no_mortalidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </th>
                    <td>
                        <input class="form-control border-radius-sm" type="text"
                            placeholder="Ingrese el nombre del fallecito" name="nombre_y_apellido" id="nombre_y_apellido"
                            minlength="3" maxlength="50" value="{{ old('nombre_y_apellido') }}">
                        @error('nombre_y_apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </td>
                    <td>
                        <input class="form-control border-radius-sm" type="number" placeholder="Edad que falleció"
                            name="edad_mortalidad" id="edad_mortalidad" min="0" value="{{ old('edad_mortalidad') }}">
                        @error('edad_mortalidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </td>
                    <td>
                        <input class="form-control border-radius-sm" type="text" placeholder="Causa de muerte"
                            name="causa" id="causa" value="{{ old('causa') }}">
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
                            <input type="text" class="form-control" id="observaciones4" rows="5"
                            placeholder="Espacio para agregar información adicional"
                            minlength ="3" maxlength="150">
                    </div>
                </div>
            </div>
        </div>

        <div class="container " style="text-align:right; margin: top 20px;">
            <div class="row align-items-start">
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div>


                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"><i
                            class="fas fa-cancel"></i> Cancelar</a>

                            <a type="reset" href="{{ route('fichafamiliar4.create4') }}" class="btn btn-warning"
                            id="botonL1"><i class="fas fa-eraser"></i> Limpiar </a>


                    <button class="btn btn-primary" id="botonS3" href="{{ route('fichafamiliar5.create5') }}">
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form id="form-eliminar-{{ $id }}" action="{{ route('fichafamiliar.eliminar', $id) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Si"></input>

                    </form>

                </div>
            </div>
        </div>
    </div>



 <!-- Modal de alerta -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Por favor, complete todo el formulario o dejelo vacío para continuar.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function validarFormulario() {
        var inputs = document.querySelectorAll('#formulario4 input[type="text"]:not(#observaciones4)');
        var todosCamposVacios = true;
        var todosCamposLlenos = true;

        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                todosCamposVacios = false;
            } else {
                todosCamposLlenos = false;
            }
        });

        if (todosCamposVacios) {
            return true; // Permitir guardar si todos los campos están vacíos
        } else if (todosCamposLlenos) {
            return true; // Permitir guardar si todos los campos están llenos
        } else {
            $('#alertModal').modal('show'); // Mostrar el modal de aviso si hay al menos un campo lleno
            return false;
        }
    }
</script>






@endsection
