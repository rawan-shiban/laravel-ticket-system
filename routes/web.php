<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
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


Route::middleware("auth")->get("/tickets",[TicketController::class,'index'])->name('tickets.index');
Route::middleware("auth")->get("/tickets/create",[TicketController::class,'create'])->name('tickets.create');
Route::get("/tickets/{id}",[TicketController::class,'show'])->name('ticktes.show');
Route::post("/tickets",[TicketController::class,'store'])->name('tickets.store');
Route::get("/tickets/{id}/edit",[TicketController::class,'edit'])->name('tickets.edit');
Route::put("/tickets/{id}",[TicketController::class,'update'])  ->name('tickets.update');
Route::delete("/tickets/{id}/delete",[TicketController::class,'destroy'])->name('tickets.destroy'); 


Route::prefix("auth")->group(function(){
    Route::get("/signup",[AuthController::class,"signupView"]);
    Route::post("/signup",[AuthController::class,"signup"])->name("auth.signup");
    Route::get("/Login",[AuthController::class,"loginView"])->name("login");
    
    Route::post("/Login",[AuthController::class,"login"])->name("auth.login_submit");
    Route::post("/logout",[AuthController::class,"logout"])->name("auth.logout");
    
    Route::get("/forgot-password",[AuthController::class,"forgotPasswordView"])->name("forgot-password-view");
    Route::post("/forgot-password",[AuthController::class,"forgotPassword"])->name("forgot-password");

    
    Route::get("/reset-password",[AuthController::class,"resetPasswordView"])->name("password.reset");
    Route::post("/reset-password",[AuthController::class,"resetPassword"])->name("password.reset.submit");

});