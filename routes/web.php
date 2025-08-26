<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

/*Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get ('/empleado/create',[EmpleadoController::class,'create']);
*/

Route::resource('empleado',EmpleadoController::class); 
Auth::routes();

Route::get('/empleado', [EmpleadoController::class, 'index']);

Route::post('/empleado/{empleado}', [EmpleadoController::class, 'store']); 

Route::get('/empleado/create', [EmpleadoController::class, 'create']); 

Route::get('/empleado/{empleado}', [EmpleadoController::class, 'show']) ->name ('empleado.show');

Route::get('/empleado/{empleado}/edit', [EmpleadoController::class, 'edit']);

Route::put('/empleado/{empleado}', [EmpleadoController::class, 'update']);

Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'destroy']);

