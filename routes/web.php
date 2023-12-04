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

Route::get('/olawelcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home.index');
})->name('index');

Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});

Route::get('/turma/{nome}', function ($nome) {
    return '<h1>Hello Turma '.$nome.'</h1>';
});

Route::fallback(function(){
    return '<h1>Desculpe, a página não existe</h1>';
});
