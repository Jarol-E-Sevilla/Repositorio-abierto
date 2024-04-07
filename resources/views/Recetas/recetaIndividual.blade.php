@extends('plantillas.plantilla')

@section('titulo', 'Recetas')

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
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" style="border: none; background: none; outline: none; width: 350px;" maxlength="50" value="{{ $recetas->nombre }}" readonly>
        <label for="edad" style="display: inline-block">Edad: </label>
        <input type="number" id="edad" name="edad" style="border: none; background: none; outline: none; width: 80px;" min="0" max="100" maxlength="3" value="{{ $recetas->edad }}" readonly>
    </div>
    <div>
        <label for="procedencia">Procedencia: </label>
        <input type="text" id="procedencia" name="procedencia" style="border: none; background: none; outline: none; width: 300px;" maxlength="50" value="{{ $recetas->procedencia }}" readonly>
        <label for="fecha" style="margin-left: 20px;">Fecha: </label>
        <input type="date" id="fecha" name="fecha" style="border: none; background: none; outline: none; width: 115px;" readonly>
    </div>
    <div>
        <label for="#exp" style="margin-left: 420px;"># Exp: </label>
        <input type="number" id="#exp" name="#exp" style="border: none; background: none; outline: none; width: 80px;" min="0" max="600" maxlength="5" value="{{ $recetas->expediente }}" readonly>
    </div>
    <div>
        <div id="item1" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item1', 200)">1. </div>
        <div id="item2" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item2', 200)">2. </div>
        <div id="item3" style="border-bottom: 1px solid black;" contenteditable="true" onkeydown="limitarCaracteres(event, 'item3', 200)">3. </div>
    </div>
    <div style="position: relative;">
        <div style="position: absolute; top: 40px; right: 0; width: 20%; border-bottom: 1px solid black;" contenteditable="true"></div>
        <div style="position: absolute; top: 60px; right: 0; font-size: 20px;" maxlength="20">Firma Dr.(a).</div>
    </div>
    <br><br><br><br>
    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
    <div style="text-align:right; margin: top 20px;">
        <button class="btn btn-primary" id="botonV1" onclick="window.location.href='{{ route('receta.index') }}'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
            </svg> Volver</button>
    </div>
</div>
@endsection