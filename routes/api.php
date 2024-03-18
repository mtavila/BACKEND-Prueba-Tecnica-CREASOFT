<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PromocionController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PDFController;
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
// Route::get('/promociones',[PromocionController::class,'index'])
//   ->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/promociones', [PromocionController::class, 'index']);
Route::post('/promociones', [PromocionController::class, 'store']);

Route::post('/registro', [ApiController::class, 'register']);
Route::get('/login', [ApiController::class, 'login']);

Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::get("listadopromociones", [PromocionController::class, 'listadoPromociones']);
    Route::get("reporte_pdf", [PDFController::class, 'getReportePromociones']);
    Route::get("profile", [ApiController::class, 'profile']);
    Route::get("logout", [ApiController::class, 'logout']);

});
