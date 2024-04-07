@extends('Plantillas.Plantilla')
@section('titulo', 'Registro')

@section('contenido')
    <div class="card m-3 p-3">
        <div class="wrapper wrapper--w960">
            <div class="card border-radius-sm border-0" style="">
                @if (session('mensaje'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('mensaje')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body border-radius-sm border-0">
                    <form method="POST" action="{{route("medicamento.update", ['id'=>$medicamento->id])}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf<br>
                        <h4 class="font-robo t" style="margin: 0; padding:0">Datos de los Medicamentos: </h4>
                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div class="row">
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="nombre_medicamento" style="margin-left: 0;">Nombre del medicamento </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el nombre del medicamento"
                                           name="nombre_medicamento" id="nombre_medicamento" minlength="3" maxlength="30"
                                           value="{{ old('nombre_medicamento', $medicamento->nombre_medicamento)}}" required>
                                    @error('nombre_medicamento')
                                    <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="compuestos" style="margin-left: 0;">Compuestos del medicamento </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese la presentación del medicamento"
                                           name="compuestos" id="compuestos" minlength="3" maxlength="30"
                                           value="{{ old('compuestos', $medicamento->compuestos)}}" required>
                                    @error('compuestos')
                                    <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="descripcion" style="margin-left: 0;">Descripción del medicamento </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese la descripción del medicamento"
                                           name="descripcion" id="descripcion" minlength="3" maxlength="80"
                                           value="{{ old('descripcion', $medicamento->descripcion)}}" required>
                                    @error('descripcion')
                                    <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div style="float: right;margin-top: 5px">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"><i class="fas fa-cancel"></i> Cancelar</button>
                            <a type="reset" href="{{ route('medicamento.edit', ['id'=>$medicamento->id]) }}" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpiar </a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="cancelarB" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Cancelar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <a type="button" href="{{ route('medicamento.edit', ['id'=>$medicamento->id]) }}" class="btn btn-danger">Si</a>
                                </div>
                            </div>
                        </div>
                    </div
@endsection
