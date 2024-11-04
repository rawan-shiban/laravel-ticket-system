<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TicketController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
})->middleware('auth:sanctum');

Route::middleware("auth:api")->get('/tickets',[TicketController::class,'index']);
Route::get('tickets/{id}',[TicketController::class,'show']); 
Route::middleware("auth:api")->post('/tickets',[TicketController::class,"store"]);
Route::put('/tickets/{id}',[TicketController::class,"update"]);
Route::delete('tickets/{id}',[TicketController::class,"destroy"]);


Route::prefix("auth")->group(function(){
    Route::post('/signup',[AuthController::class,"signup"])->name("singup");
    Route::post('/login',[AuthController::class,"login"])->name("login2");
    Route::middleware("auth:sanctum")->post('/logout',[AuthController::class,"logout"])->name("logout");
});