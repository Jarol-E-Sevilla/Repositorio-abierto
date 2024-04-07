
@extends('Plantillas.Plantilla')
@section('titulo', 'Registro')

@section('contenido')
    <div class="card m-3 p-3">
        <div class="wrapper wrapper--w960">
            <div class="card border-radius-sm border-0" style="">
                <div class="card-body border-radius-sm border-0">
                    <form method="POST" action="{{route("empleado.updateEdi",['id' => $empleado ->id])}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h4 class="font-robo t" style="margin: 0; padding:0">Datos del Empleado: </h4>
                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div class="row">
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="nombres" style="margin-left: 0;">Nombres: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese los nombres del empleado"
                                    name="nombres" id="nombres" minlength="3" maxlength="30"
                                    value="{{ old('nombres', $empleado->nombres)}}" required>
                                    @error('nombres')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="primer_apellido" style="margin-left: 0;">Primer apellido: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el primer apellido"
                                    name="primer_apellido" id="primer_apellido" minlength="3" maxlength="25"
                                    value="{{ old('primer_apellido', $empleado->primer_apellido)}}" required>
                                    @error('primer_apellido')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group" style="margin-bottom: 5px">
                                    <label for="segundo_apellido" style="margin-left: 0;">Segundo apellido: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el segundo apellido"
                                        name="segundo_apellido" id="segundo_apellido" minlength="3" maxlength="25"
                                        value="{{ old('segundo_apellido', $empleado->segundo_apellido)}}" >
                                    @error('segundo_apellido')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="font-robo form-group" style="margin-bottom: 5px">
                                    <label for="dni" style="margin-left: 0;">Número de identidad (DNI): </label>
                                    <input class="form-control border-radius-sm" type="number"
                                        placeholder="Ingrese su número de identidad " name="dni" id="dni"
                                        value="{{ old('dni', $empleado->dni) }}" min="0" minDigits="13" maxDigits="13" size="13">
                                    @error('dni')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group" style="margin-bottom: 5px">
                                    <label for="fecha_de_nacimiento" style="margin-left: 0;">Fecha de nacimiento: </label>
                                    <input class="form-control border-radius-sm" type="date"
                                        placeholder="Ingrese su fecha de nacimiento" name="fecha_de_nacimiento" id="fecha_de_nacimiento"
                                        value="{{ old('fecha_de_nacimiento', $empleado->fecha_de_nacimiento) }}" max={{ now() }} required>
                                    @error('fecha_de_nacimiento')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="sexo" style="margin-left: 0;">Seleccione el sexo de la persona: </label>
                                    <select name="sexo" id="sexo" class="form-control form-select" required>
                                        @if ($empleado->sexo)
                                            @if ($empleado->sexo === 'F')
                                                <option style="display: none" selected="selected" value="F">Femenino</option>
                                            @else
                                                @if ($empleado->sexo === 'M')
                                                    <option style="display: none" selected="selected" value="M">Masculino</option>
                                                @else
                                                @endif
                                            @endif
                                        @else
                                            <option disabled="disabled" selected="selected" value="{{ $empleado->sexo }}">{{old('sexo', $empleado->sexo)}}</option>
                                        @endif
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                    @error('sexo')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="cargo" style="margin-left: 0;">Cargo: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el cargo"
                                    name="cargo" id="cargo" minlength="3" maxlength="25"
                                    value="{{ old('cargo', $empleado->cargo)}}" required>
                                    @error('cargo')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="telefono" style="margin-left: 0;">Teléfono </label>
                                    <input class="form-control border-radius-sm" type="tel" placeholder="Ingrese el número de teléfono"
                                    name="telefono" id="telefono" min="0" minlength="8" maxlength="8"
                                    value="{{ old('telefono', $empleado->telefono)}}" required>
                                    @error('telefono')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="procedencia" style="margin-left: 0;">Procedencia: </label>
                                    <textarea class="form-control border-radius-sm" type="text" placeholder="Ingrese la procedencia"
                                    name="procedencia" id="procedencia" minlength="3" maxlength="50"
                                    required>{{old('procedencia', $empleado->procedencia)}}</textarea>
                                    @error('procedencia')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="tipo" style="margin-left: 0;">Seleccione el tipo de sangre: </label>
                                    <select name="tipo" id="tipo" class="form-control form-select" required>
                                        @if ($empleado->tipo)
                                            @if ($empleado->tipo=== 'A')
                                                <option style="display: none" selected="selected" value="A">"A"</option>
                                            @else
                                                @if ($empleado->tipo === 'B')
                                                    <option style="display: none" selected="selected" value="B">"B"</option>
                                                @else
                                                    @if ($empleado->tipo === 'AB')
                                                        <option style="display: none" selected="selected" value="AB">"AB"</option>
                                                    @else
                                                        @if ($empleado->tipo === 'O')
                                                            <option style="display: none" selected="selected" value="O">"O"</option>
                                                        @else
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @else
                                            <option disabled="disabled" selected="selected" value="{{ $empleado->tipo }}">{{old('tipo', $empleado->tipo)}}</option>
                                        @endif
                                        <option value="A">"A"</option>
                                        <option value="B">"B"</option>
                                        <option value="AB">"AB"</option>
                                        <option value="O">"O"</option>
                                    </select>
                                    @error('tipo')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="Rh" style="margin-left: 0;">Seleccione el Rh: </label>
                                    <select name="Rh" id="Rh" class="form-control form-select" required>
                                        @if ($empleado->Rh)
                                            @if ($empleado->Rh === '+')
                                                <option style="display: none" selected="selected" value="+">Positivo "+"</option>
                                            @else
                                                @if ($empleado->Rh === '-')
                                                    <option style="display: none" selected="selected" value="-">Negativo "-"</option>
                                                @else
                                                @endif
                                            @endif
                                        @else
                                            <option disabled="disabled" selected="selected" class="" value="{{ $empleado->Rh }}">{{old('Rh', $empleado->Rh)}}</option>
                                        @endif
                                        <option value="+">Positivo "+"</option>
                                        <option value="-">Negativo "-"</option>
                                    </select>
                                    @error('Rh')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="enfermedades" style="margin-left: 0;">Enfermedades que padece: </label>
                                    <textarea class="form-control border-radius-sm" type="text" placeholder="Ingrese las enfermedades que padece"
                                    name="enfermedades" id="enfermedades" minlength="3" maxlength="50">{{old('enfermedades', $empleado->enfermedades)}}</textarea>
                                    @error('enfermedades')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="font-robo form-group">
                                    <label for="medicamentos" style="margin-left: 0;">Medicamentos y dosis: </label>
                                    <textarea class="form-control border-radius-sm" type="text" placeholder="Ingrese los medicamentos y la dosis que usa"
                                    name="medicamentos" id="medicamentos" minlength="3" maxlength="80">{{old('medicamentos', $empleado->medicamentos)}}</textarea>
                                    @error('medicamentos')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div style="float: right;margin-top: 5px">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"
                            ><i class="fas fa-cancel"></i> Cancelar</button>
                            <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpiar</button>
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
                            <div class="modal-body">
                            ¿Desea cancelar lo que esta haciendo?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a type="button" href="{{route('empleado.index',['id' => $empleado ->id])}}" class="btn btn-danger" >Si</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Validar la entrada para permitir solo hasta 13 caracteres
            document.getElementById('dni').addEventListener('input', function() {
                if (this.value.length > 13) {
                    this.value = this.value.slice(0, 13); // Limitar a 13 caracteres
                }
            });


            // Validar la entrada para permitir solo números
            document.getElementById('dni').addEventListener('keypress', function(event) {
                if (event.key.length === 1 && event.key.match(/[^0-9]/)) {
                    event.preventDefault(); // Evitar que se ingrese caracteres que no son números
                }
            });
        </script>
    </div>

@endsection
