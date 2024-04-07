<?php

use App\Http\Controllers\At2rController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\fichafamController;
use App\Http\controllers\MiembroController;
use App\Http\controllers\ListadoController;
use App\Http\controllers\MedicamentoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ataController;
use App\Models\Consulta;
use DragonCode\Contracts\Cache\Store;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Rutas de empleados
 */
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');

Route::get('/empleado/crear', [EmpleadoController::class, 'create'])
->name('empleado.create');
Route::get('/empleado/{id}/editar', [EmpleadoController::class, 'edit'])
->name('empleado.edit')->where('id','[0-9]+');

Route::post('/empleado/guardar', [EmpleadoController::class, 'store'])
->name('empleado.store');
Route::put('/empleado/{id}/editar', [EmpleadoController::class, 'update'])
->name('empleado.update')->where('id','[0-9]+');

Route::get('/empleado/{id}', [EmpleadoController::class, 'show'])->name('empleado.mostrar');

Route::post('/empleado/buscar', [EmpleadoController::class, 'buscar'])->name('empleado.buscar');


/**
 * Rutas de paciente
 */

Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');

Route::get('/paciente/crear', [PacienteController::class, 'create'])
->name('paciente.create');



Route::post('/paciente/guardar', [PacienteController::class, 'store'])
->name('paciente.store');

Route::get('/paciente/{id}/editar', [PacienteController::class, 'edit'])
->name('paciente.edit')->where('id','[0-9]+');

Route::put('/paciente/{id}/editar', [PacienteController::class, 'update'])
->name('paciente.update')->where('id','[0-9]+');

Route::get('/paciente/{id}', [PacienteController::class, 'show'])->name('paciente.mostrar');

Route::post('/paciente/buscar', [PacienteController::class, 'buscar'])->name('paciente.buscar');


/**
 * Rutas de Ficha familiar
 */
Route::get('/fichafamiliar', [fichaFamController::class, 'create'])
->name('fichafamiliar.create');
Route::post('/fichafamiliar/guardar', [fichaFamController::class, 'store'])
->name('fichafamiliar.store');

Route::get('/fichafamiliar/{id}/editar', [fichaFamController::class, 'edit'])
    ->name('fichafamiliar.edit')->where('id','[0-9]+');

Route::put('/fichafamiliar/{id}/editar', [fichaFamController::class, 'update'])
    ->name('fichafamiliar.update')->where('id','[0-9]+');

//Rutas de formularios de ficha familiar formulario2
Route::get('/fichafamiliar2', [fichaFamController::class, 'create2'])
->name('fichafamiliar2.create2');
Route::post('/fichafamiliar2/guardar2', [fichaFamController::class, 'store2'])
->name('fichafamiliar2.store2');

//Rutas de formularios de ficha familiar formulario3
Route::get('/fichafamiliar3', [fichaFamController::class, 'create3'])
->name('fichafamiliar3.create3');
Route::post('/fichafamiliar3/guardar3', [fichaFamController::class, 'store3'])
->name('fichafamiliar3.store3');

//Rutas de formularios de ficha familiar formulario4
Route::get('/fichafamiliar4', [fichaFamController::class, 'create4'])
->name('fichafamiliar4.create4');
Route::post('/fichafamiliar4/guardar4', [fichaFamController::class, 'store4'])
->name('fichafamiliar4.store4');

//Rutas de formularios de ficha familiar formulario5
Route::get('/fichafamiliar5', [fichaFamController::class, 'create5'])
->name('fichafamiliar5.create5');
Route::post('/fichafamiliar5/guardar5', [fichaFamController::class, 'store5'])
->name('fichafamiliar5.store5');


Route::controller(fichaFamController::class)->group(function (){
    //para vistas editar
    Route::get('/fichafamiliar/{id}/editar','edit')
        ->name('fichafamiliar.edit')->where('id','[0-9]+');
    Route::get('/fichafamiliar/{id}/editar2','editar2')
        ->name('fichafamiliar.edit2')->where('id','[0-9]+');
    Route::get('/fichafamiliar/{id}/editar3','editar3')
        ->name('fichafamiliar.edit3')->where('id','[0-9]+');
    Route::get('/fichafamiliar/{id}/editar4','editar4')
        ->name('fichafamiliar.edit4')->where('id','[0-9]+');
    Route::get('/fichafamiliar/{id}/editar5','editar5')
        ->name('fichafamiliar.edit5')->where('id','[0-9]+');

    //actualizar
    Route::put('/fichafamiliar/{id}/editar', 'update')
        ->name('fichafamiliar.update')->where('id','[0-9]+');
    Route::put('/fichafamiliar/editar2/{id}', 'update2')
        ->name('fichafamiliar.update2')->where('id','[0-9]+');
    Route::put('/fichafamiliar/{id}/editar3', 'update3')
        ->name('fichafamiliar.update3')->where('id','[0-9]+');
    Route::put('/fichafamiliar/{id}/editar4', 'update4')
        ->name('fichafamiliar.update4')->where('id','[0-9]+');
    Route::put('/fichafamiliar/{id}/editar5', 'update5')
        ->name('fichafamiliar.update5')->where('id','[0-9]+');
});

// Ruta para eliminar los datos
Route::delete('/fichafamiliar/{id}/eliminar', [fichaFamController::class, 'eliminar'])->name('fichafamiliar.eliminar');

Route::get('/fichaformulario/crear', [fichaFamController::class, 'create'])->name('fichaformulario.create');

Route::get('/fichaformulario', [fichaFamController::class, 'index'])->name('fichaformulario.index');

Route::get('/fichaformulario/lista', [fichaFamController::class, 'ver'])->name('fichaformulario.ver');

Route::get('/fichaformulario/buscar', [fichaFamController::class, 'buscar'])->name('fichaformulario.buscar');

Route::get('/fichaformulario/{id}', [fichaFamController::class, 'show'])->name('fichafamiliar.mostrar');

//Rutas para PDF

Route::get('/fichafamiliar/{id}/pdf', [fichaFamController::class, 'pdf'])
    ->name('fichafamiliar.pdf');


    /**
 * Rutas de medicamentos
 */

Route::get('/medicamento/crear', [MedicamentoController::class, 'create'])->name('medicamento.create');
Route::post('/medicamento/guardar', [MedicamentoController::class, 'store'])->name('medicamento.store');
Route::get('/medicamento/{id}/editar', [MedicamentoController::class, 'edit'])
            ->name('medicamento.edit')->where('id','[0-9]+');
Route::put('/medicamento/{id}/editar', [MedicamentoController::class, 'update'])
    ->name('medicamento.update')->where('id','[0-9]+');


// Define las rutas

Route::get('/consulta/buscar', [ConsultaController::class, 'buscar'])->name('consulta.buscar');
Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta.index');
Route::get('/consulta/crear', [ConsultaController::class, 'create'])->name('consulta.create');
Route::post('/consulta/guardar', [ConsultaController::class, 'store'])->name('consulta.store');
Route::get('/consulta/{id}/editar', [ConsultaController::class, 'edit'])
            ->name('consulta.edit')->where('id','[0-9]+');

Route::get('/consulta/{id}', [ConsultaController::class, 'show'])->name('consulta.mostrar');



Route::put('/consulta/{id}/editar', [ConsultaController::class, 'update'])
    ->name('consulta.update')->where('id','[0-9]+');

//Rutas At2r
Route::get('/at2r/buscar', [At2rController::class, 'buscar'])->name('at2r.buscar');
Route::get('/at2r', [At2rController::class, 'index'])->name('at2r.index');
Route::get('/at2r/crear/', [At2rController::class, 'create'])->name('at2r.create');

Route::get('/at2r', [At2rController::class, 'show'])->name('at2r.mostrar');
Route::get('/at2r/individual/{id}', [At2rController::class, 'show2'])->name('at2r.mostrarindividual');


// Rutas de receta

Route::get('/receta', [RecetaController::class, 'index'])->name('receta.index');
Route::get('/receta/crear', [RecetaController::class, 'create'])->name('receta.create');
Route::post('/receta/guardar', [RecetaController::class, 'store'])->name('receta.store');
Route::get('/receta/buscar', [RecetaController::class, 'buscar'])->name('receta.buscar');
Route::get('/receta/lista', [RecetaController::class, 'ver'])->name('receta.ver');
Route::get('/receta{id}', [RecetaController::class, 'show'])->name('receta.mostrar');

// Rutas de ATA
Route::get('/ata', [ataController::class, 'create'])->name('ata.create');
