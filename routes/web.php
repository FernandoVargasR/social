<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;

Route::get('inicio', function(){
    return view('inicio');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('programa', ProgramaController::class);//->middleware('auth');