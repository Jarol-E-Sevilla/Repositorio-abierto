
@extends('Plantillas.Plantilla')
@section('titulo', 'RegistroReceta')

@section('contenido')


   
<div style="width: 60%; height:100%;margin: 0 auto; border: 2px solid #333; padding: 20px;">
<div class="container">
<div class="images">
        <div class="left-image" style="position: relative;margin-top:-30px;">
            <img src="https://www.salud.gob.hn/sshome/templates/saludhn2022t2/images/logo.png" alt="Logo Izquierda" style="width: 200px; height: auto; position: absolute; top: 15%; transform: translateY(-50%); left: -40px;">
        </div>
        <div class="right-image" style="position: relative;margin-top:-30px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gobierno_de_Honduras_%282022-%29.svg/2560px-Gobierno_de_Honduras_%282022-%29.svg.png" alt="Logo Derecha" style="width: 200px; height: auto; position: absolute; top: 15%; transform: translateY(-50%); right: -40px;">
        </div>
    </div>
</div>
<div class="titles" style="margin-top:-80px;">
<h6 style="text-align: center; font-weight: bold; font-family: Arial;">UNIDAD DE SALUD TRINIDAD MARADIAGA: </h6>
    <h6 style="text-align: center; font-weight: bold; font-family: Arial;">RECETARIO MEDICO: </h6>
    <h6 style="text-align: center; font-family: Arial;">Secretaria de salud</h6>
    <h6 style="text-align: center; font-family: Arial;">Establecimiento de salud, Jacaleapa</h6>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
</div>





<div>
<label for="nombres" >Nombre:</label>
<input type="text" id="nombres" name="nombres" style="border: none; background: none; outline: none; width: 350px;" maxlength="50">



    <label for="edad" style="display: inline-block">Edad: </label>
    <input type="number" id="edad" name="edad" style="border: none; background: none; outline: none; width: 80px;" min="0" max="100" maxlength = "3">
    <script>
                            document.getElementById('edad').addEventListener('input', function() {
                            var input = this.value;
                           var regex = /^\d{1,3}(\.\d{0,1})?$/;
                                 if (!regex.test(input)) {
                                    this.value = input.slice(0, -1);
                                       }
                                     });
                                         </script>
</div>


<div>
<label for="procedencia">Procedencia: </label>
<input type="text" id="procedencia" name="procedencia" style="border: none; background: none; outline: none; width: 300px;" maxlength="50">

    
    <label for="fecha" style="margin-left: 20px;">Fecha: </label>
<input type="date" id="fecha" name="fecha" style="border: none; background: none; outline: none; width: 115px;" readonly>

<script>
    // Función para obtener la fecha actual y establecerla en el campo de fecha
    function cargarFechaActual() {
        // Obtener el elemento del campo de fecha
        var campoFecha = document.getElementById('fecha');

        // Obtener la fecha actual en la zona horaria local
        var fechaActual = new Date();

        // Obtener los componentes de la fecha
        var dia = fechaActual.getDate();
        var mes = fechaActual.getMonth() + 1; // Los meses son indexados desde 0
        var año = fechaActual.getFullYear();

        // Formatear la fecha como "YYYY-MM-DD"
        var fechaFormateada = año + '-' + (mes < 10 ? '0' + mes : mes) + '-' + (dia < 10 ? '0' + dia : dia);

        // Asignar la fecha actual al campo de fecha
        campoFecha.value = fechaFormateada;
    }

    // Llamar a la función al cargar la página
    window.onload = cargarFechaActual;
</script>


</div>

<div>
    
<label for="expediente" style="margin-left: 420px;"># Exp: </label>
    <input type="number" id="expediente" name="expediente" style="border: none; background: none; outline: none; width: 80px;" min="0" max="600" maxlength = "5">
    <script>
                            document.getElementById('expediente').addEventListener('input', function() {
                            var input = this.value;
                           var regex = /^\d{1,5}(\.\d{0,1})?$/;
                                 if (!regex.test(input)) {
                                    this.value = input.slice(0, -1);
                                       }
                                     });
                                         </script>
</div>

<div>
    <div id="item1" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item1', 200)">1. </div>
    <div id="item2" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item2', 200)">2. </div>
    <div id="item3" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item3', 200)">3. </div>
</div>

<script>
    function limitarCaracteres(event, id, maxLength) {
        let elemento = document.getElementById(id);
        if (elemento.innerText.length >= maxLength && event.keyCode !== 8) {
            event.preventDefault();
        }
    }
</script>



<div style="position: relative;">
    <div style="position: absolute; top: 40px; right: 0; width: 20%; border-bottom: 1px solid black;" contenteditable="true"></div>
    <div style="position: absolute; top: 60px; right: 0; font-size: 20px;" maxlength="20">Firma Dr.</div>
</div>


<br>
<br>
<br>
<br>

<hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                        <div style="text-align:right; margin: top 20px;">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarB"
                            ><i class="fas fa-cancel"></i> Cancelar</button>
                            <a type="reset" href="{{ route('receta.create') }} "class="btn btn-warning"><i class="fas fa-eraser"></i> Limpiar </a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
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
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a type="button"  href="{{ route('receta.index') }}" class="btn btn-danger">Si</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection