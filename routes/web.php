<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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
Route::get("/tickets",[TicketController::class,'index'])->name('tickets.index');
Route::get("/tickets/create",[TicketController::class,'create'])->name('tickets.create');
Route::get("/tickets/{id}",[TicketController::class,'show'])->name('ticktes.show');
Route::post("/tickets",[TicketController::class,'store'])->name('tickets.store');
Route::get("/tickets/{id}/edit",[TicketController::class,'edit'])->name('tickets.edit');
Route::put("/tickets/{id}",[TicketController::class,'update'])  ->name('tickets.update');
Route::delete("/tickets/{id}/delete",[TicketController::class,'destroy'])->name('tickets.destroy'); 


