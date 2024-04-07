@extends('Plantillas.Plantilla')
@section('titulo', 'RegistroPaciente')

@section('contenido')
<div class="card m-3 p-3">
<div class="wrapper wrapper--w960">
            <div>  
                @if (session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('mensaje')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
               @endif
               
               <div class="card-body border-radius-sm border-0"> 
            <form method="POST" action= "{{route("paciente.store")}}" enctype="multipart/form-data">
@csrf
<h4 class="font-robo t" style="margin: 0; padding:0">Datos del Paciente: </h4>
<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
<div class="row">
        <div class="col-4">
          <div class="font-robo form-group">
            <label for="nombres" style="margin-left: 0;">Nombres: </label>
            <input class="form-control border-radius-sm" type="text" placeholder="Ingrese los nombres del paciente"
              name="nombres" id="nombres" minlength="3" maxlength="50"
               value="{{ old('nombres')}}" required>
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
                                    value="{{ old('primer_apellido')}}" required>
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
                                        value="{{ old('segundo_apellido',)}}">
                                    @error('segundo_apellido')
                                        <strong class="menerr" style="color:red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                        <div class="row">

       <div class="row">
    <div class="col-4">
        <div class="font-robo form-group">
            <label for="expediente" style="margin-left: 0;">Número de expediente:</label>
            <input class="form-control border-radius-sm" type="number" placeholder="Ingresar número de expediente"
                   name="expediente" id="expediente" min="0" max="600" maxlength="5" value="{{ old('expediente') }}" required>
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

    <div class="col-4">
        <div class="font-robo form-group">
            <label for="dni" style="margin-left: 0;">Número de identidad:</label>
            <input class="form-control border-radius-sm" type="text" placeholder="Ingresar número de identidad" name="dni" id="dni" 
            value="{{ old('dni') }}" required>
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
            <input class="form-control border-radius-sm" type="date"
                placeholder="Ingrese su fecha de nacimiento" name="fecha_de_nacimiento" id="fecha_de_nacimiento"
                value="{{ old('fecha_de_nacimiento') }}" required>
            @error('fecha_de_nacimiento')
                <strong class="menerr" style="color:red">{{ $message }}</strong>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-4">
        <div class="font-robo form-group" style="margin-bottom: 5px">
            <label for="temperatura" style="margin-left: 0;">Temperatura (°C): </label>
            <input class="form-control border-radius-sm" type="number"
                placeholder="Ingrese la temperatura" name="temperatura" id="temperatura"
                value="{{ old('temperatura')}}"   min="35" max="42" step="0.1" maxlength="5" required>
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

    <div class="col-4">
        <div class="font-robo form-group">
            <label for="sexo" style="margin-left: 0;">Seleccione el sexo de la persona: </label>
            <select name="sexo" id="sexo" class="form-control form-select" required>
                @if (old('sexo'))
                    @if (old('sexo') === 'F')
                        <option style="display: none" selected="selected" value="F">Femenino</option>
                    @else
                        @if (old('sexo') === 'M')
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
            <label for="peso" style="margin-left: 0;">Peso (kg): </label>
            <input class="form-control border-radius-sm" type="number"
                placeholder="Ingrese el peso del paciente" name="peso"  id="peso"
                value="{{ old('peso') }}" min="0" max="500" step="0.1" maxlength="5" required>
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
</div>

                       <div class="col-4">
                            <div class="font-robo form-group" style="margin-bottom: 5px">
                                <label for="presion_arterial" style="margin-left: 0;">Presión alterial: </label>
                                <input class="form-control border-radius-sm" type="text"
                                    placeholder="Ingrese la presión del paciente" name="presion_arterial"  id="presion_arterial"
                                    value="{{ old('presion_arterial') }}" pattern="\d{2,3}\/\d{2,3}" 
                                 title="Ingrese un formato válido de presión arterial (por ejemplo, 120/80)" required>
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

                   }

                               });
                                    </script>
                       </div>


                        <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div style="text-align:right; margin: top 20px;">
                        <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('paciente.index') }}'">
    <i class="fas fa-times"></i> Cancelar
</button>

                            <a type="reset" href="{{ route('paciente.create') }} "class="btn btn-warning"><i class="fas fa-eraser"></i> Limpiar </a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                        </div>
                    </form>
  
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection