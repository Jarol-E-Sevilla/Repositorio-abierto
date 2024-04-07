@extends('Plantillas.Plantilla')
@section('titulo', 'RegistroPaciente')

@section('contenido')
    <div class="card m-3 p-3">
        <div class="wrapper wrapper--w960">
            <div class="card border-radius-sm border-0" style="">
                <div class="card-body border-radius-sm border-0">
                    <form method="POST" action="{{route("paciente.update",['id' => $paciente ->id])}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h4 class="font-robo t" style="margin: 0; padding:0">Datos del Paciente: </h4>
                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div class="row">
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="nombres" style="margin-left: 0;">Nombres: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese los nombres del paciente"
                                    name="nombres" id="nombres" minlength="3" maxlength="25"
                                    value="{{ old('nombres', $paciente->nombres)}}" required>
                                    @error('nombres')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group">
                                    <label for="primer_apellido" style="margin-left: 0;">Primer apellido: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el primer apellido"
                                    name="primer_apellido" id="primer_apellido" minlength="3" maxlength="15" pattern="[^\s]+"
                                    value="{{ old('primer_apellido', $paciente->primer_apellido)}}" required>
                                    @error('primer_apellido')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>


                                
                            </div>
                            <div class="col-4">
                                <div class="font-robo form-group" style="margin-bottom: 5px">
                                    <label for="segundo_apellido" style="margin-left: 0;">Segundo apellido: </label>
                                    <input class="form-control border-radius-sm" type="text" placeholder="Ingrese el segundo apellido"
                                        name="segundo_apellido" id="segundo_apellido" minlength="3" maxlength="15" pattern="[^\s]+" 
                                        value="{{ old('segundo_apellido', $paciente->segundo_apellido)}}" >
                                    @error('segundo_apellido')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div> 

                        <div>
    <div class="row">
        <div class="col-4">
            <div class="font-robo form-group">
                <label for="expediente" style="margin-left: 0;">Número de expediente: </label>
                <input class="form-control border-radius-sm" type="number" placeholder="Ingresar numero de expediente"
                       name="expediente" id="expediente" min="0" max="600"  maxlength="5"   value="{{ old('expediente', $paciente->expediente)}}" required> 
                @error('expediente')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <script>
                            document.getElementById('expediente').addEventListener('input', function() {
                            var input = this.value;
                           var regex = /^\d{1,6}(\.\d{0,1})?$/;
                                 if (!regex.test(input)) {
                                    this.value = input.slice(0, -1);
                                       }
                                     });
                                         </script>
        </div>
    </div>
</div>

                        <div class="row">
    <div class="col-4">
        <div class="font-robo form-group">
            <label for="dni" style="margin-left: 0;">Número de identidad:</label>
            <input class="form-control border-radius-sm" type="text" placeholder="xxxx xxxx xxxx"
             name="dni" id="dni" value="{{ old('dni',$paciente->dni) }}" required>
            @error('dni')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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

    <div class="col-4">
        <div class="font-robo form-group" style="margin-bottom: 5px">
            <label for="fecha_de_nacimiento" style="margin-left: 0;">Fecha de nacimiento:</label>
            <input class="form-control border-radius-sm" type="date" placeholder="Ingrese su fecha de nacimiento"
             name="fecha_de_nacimiento" id="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento', $paciente->fecha_de_nacimiento) }}" 
             max={{ now() }} required>
            @error('fecha_de_nacimiento')
            <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="font-robo form-group" style="margin-bottom: 5px">
            <label for="temperatura" style="margin-left: 0;">Temperatura (°C): </label>
            <input class="form-control border-radius-sm" type="number"
                placeholder="ingrese la temperatura" name="temperatura" id="temperatura"
                value="{{ old('temperatura', $paciente->temperatura)}}"   min="35" max="42" step="0.1" maxlength="5" required>
            @error('temperatura')
                <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    $(document).ready(function () {
        $('#temperatura').on('input', function () {
            var input = $(this).val();
            var regex = /^\d{1,3}(\.\d{0,2})?$/; // Ahora acepta hasta dos decimales
            if (!regex.test(input)) {
                $(this).val(input.slice(0, -1));
            }
        });
    });
</script>

    </div>
</div>


<div class="row">
    <div class="col-4">
        <div class="font-robo form-group">
            <label for="sexo" style="margin-left: 0;">Sexo del paciente: </label>
            <select name="sexo" id="sexo" class="form-control form-select" required>
            @if ($paciente->sexo)
                                            @if ($paciente->sexo === 'F')
                        <option style="display: none" selected="selected" value="F">Femenino</option>
                    @else
                    @if ($paciente->sexo === 'M')
                            <option style="display: none" selected="selected" value="M">Masculino</option>
                        @else
                        @endif
                    @endif
                @else
                    <option disabled="disabled" selected="selected" value="">-- Seleccione --</option>
                @endif
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
            @error('sexo')
                <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="col-4">
        <div class="font-robo form-group" style="margin-bottom: 5px">
            <label for="peso" style="margin-left: 0;">peso (kg): </label>
            <input class="form-control border-radius-sm" type="number"
                placeholder="ingrese el peso" name="peso"  id="peso"
                value="{{ old('peso', $paciente->peso)}}"   min="0" max="500" step="0.1" maxlength="5" required>
            @error('peso')
                <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
        <script>
    document.getElementById('peso').addEventListener('input', function() {
        var input = this.value;
        var regex = /^\d{1,3}(\.\d{0,1})?$/;
        if (!regex.test(input)) {
            this.value = input.slice(0, -1);
        }
    });
</script>

    </div>

    <div class="col-4">
        <div class="font-robo form-group" style="margin-bottom: 5px">
            <label for="presion_arterial" style="margin-left: 0;">Presión arterial: </label>
            <input class="form-control border-radius-sm" type="text"
                placeholder="ingrese la presion arterial" name="presion_arterial"  id="presion_arterial" 
                value="{{ old('presion_arterial',$paciente->presion_arterial) }}" pattern="\d{2,3}\/\d{2,3}" 
               title="Ingrese un formato válido de presión arterial (por ejemplo, 120/80)" maxlength="7" required>
            @error('presion_arterial')
                <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
        <script>
    document.getElementById('presion_arterial').addEventListener('input', function() {
        var input = this.value;
        var regex = /^\d{1,3}\/\d{1,3}$/;
        if (!regex.test(input)) {
            this.setCustomValidity("Ingrese un formato válido de presión arterial (por ejemplo, 120/80)");
        } else {
            this.setCustomValidity("");

            var valores = input.split('/');
            var sistolica = parseInt(valores[0]);
            var diastolica = parseInt(valores[1]);

            if (sistolica < 90 || sistolica > 180 || diastolica < 60 || diastolica > 120) {
                this.setCustomValidity("Los valores de presión arterial deben estar dentro del rango: Sistólica (90-180) y Diastólica (60-120)");
            } else {
            
            console.log('Presión arterial sistólica: ' + sistolica);
            console.log('Presión arterial diastólica: ' + diastolica);
        }
    }

    });
</script>

   </div>
</div>

                        
                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div style="float: right;margin-top: 5px">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"
                            ><i class="fas fa-cancel"></i> Cancelar</button>
                            <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Limpiar</button>
                            <input type="submit" class="btn btn-success" value=Guardar>
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
                            <a type="button" href={{route('paciente.index',['id' => $paciente ->id])}} class="btn btn-danger">Si</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection