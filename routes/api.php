<?php

use App\Http\Controllers\Api\EscalaController;
use App\Http\Controllers\Api\v1\EscalaController as EscalaControllerApiV1;
use App\Http\Controllers\EscalaVoluntarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/app/init', function () {
    return response()->json([
        'minVersionCode' => '5',
        'version' => '1.4.0',
        'mensagens' => [
//            "O pastor convoca todos os obreiros da igreja MSV para uma reunião a ser realizada no dia 03/01/2024 às 14h:00."
        ]
    ]);
});

Route::prefix('v1')->group(function () {
    Route::get('/escalas', [EscalaControllerApiV1::class, 'index'])->name('api.escalas');
    Route::post('/escalas/voluntario', [EscalaControllerApiV1::class, 'store'])->name('api.escalas.store');
});

Route::get('/escalas', [EscalaController::class, 'index'])->name('api.escalas');
Route::post('/escalas/voluntario', [EscalaController::class, 'store'])->name('api.escalas.store');

Route::put('/escala-voluntario', [EscalaVoluntarioController::class, 'updateApi'])->name('api.escala.voluntario');
