<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\api\MunicipioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Psy\sh;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great! 
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas');
Route::delete('/comunas/{comunas}', [ComunaController::class, 'destroy'])->name('comuna.destroy');
Route::get('/comunas/{comunas}', [ComunaController::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comunas}', [ComunaController::class, 'update'])->name('comunas.update');

Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');
