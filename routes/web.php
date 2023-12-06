<?php

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
})->name('welcome');

//users
Route::get('/add-user', function(){
    return view('users.add_user');
})->name('users.add');

Route::get('/all-users', function(){
    return view('users.all_users');
})->name('users.all');

//rota home, retorna a página inicial da nossa app
Route::get('/home', function () {
    return view('home.index');
})->name('index');


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
