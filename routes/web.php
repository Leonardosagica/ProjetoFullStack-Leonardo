<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'welcome'] )->name('welcome');

//rota home, retorna a página inicial da nossa app
Route::get('/home', [IndexController::class, 'home'])->name('index');


//users
Route::get('/add-user', function(){
    return view('users.add_user');
})->name('users.add');

Route::get('/view-user', function(){
    return view('users.view_user');
})->name('users.view');

Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');


//rota teste, retorna uma tag <h1>Hello World</h1>
Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});

Route::get('/turma/{nome}', function ($nome) {
    return '<h1>Hello Turma '.$nome.'</h1>';
});


//rota fallback, quando chamamos por uma rota não registada
Route::fallback(function(){
    return view('home.fallback');
});
