<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

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

Route::middleware('auth:sanctum')->group(function () {

    /* Route::get('user', function (Request $request) {
        return $request->user();
    }); */

});


    // login users type
    Route::get('/adm', [AuthController::class, 'loginAdm'])->name('adm');
    Route::get('/client', [AuthController::class, 'loginPatient'])->name('client');
    Route::get('/doctors', [AuthController::class, 'loginDoctor'])->name('doctors');

    /* users routes */
    Route::get('/users', [UserController::class, 'show']);
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/add_user', [UserController::class, 'create']);
    Route::put('/add_user/{user}', [UserController::class, 'update']);
    Route::get('/user/{user}', [UserController::class, 'getUserId']);
    Route::delete('/user_delete/{user}', [UserController::class, 'destroy']);

    // doctors routes
    Route::get('/add_doctors', [DoctorController::class, 'show'] );
    Route::get('/add_doctors_show', [DoctorController::class, 'show']);
    Route::post('/add_doctors_create', [DoctorController::class, 'create'] );
    Route::put('/add_doctors_create/{doctor}', [DoctorController::class, 'update']);
    Route::get('/add_doctors_show/{doctor}', [DoctorController::class, 'getDoctorId']);



    // login/signup/logout Routes
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);







