<?php

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
});

Route::get('/tickets',[TicketController::class,'index']);
Route::get('tickets/{id}',[TicketController::class,'show']); 
Route::post('/tickets',[TicketController::class,"store"]);
Route::put('/tickets/{id}',[TicketController::class,"update"]);
Route::delete('tickets/{id}',[TicketController::class,"destroy"]);