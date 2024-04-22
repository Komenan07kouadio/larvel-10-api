<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//crée un lien qui permettra aux étudiants : React, Vue, Angular, Node, JS NAtive

use App\Http\Controllers\EtudiantController;

Route::get('etudiants', [EtudiantController::class, 'index']);


Route::post('etudiants', [EtudiantController::class, 'store']);


Route::get('etudiants/{id}', [EtudiantController::class, 'show']);


Route::put('etudiants/{id}', [EtudiantController::class, 'update']);


Route::delete('etudiants/{id}', [EtudiantController::class, 'destroy']);

Route::post('register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
 