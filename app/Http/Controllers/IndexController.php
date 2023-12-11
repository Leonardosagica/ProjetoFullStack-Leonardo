<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class IndexController extends Controller
{

    public function welcome(){
        return view('welcome');
    }

    public function home(){
        $hello = 'Estamos On e vamos ser os melhores programadores de Laravel';
        $turma = 'turma flag';

        return view('home.index', compact('hello', 'turma'));
    }

    public function hello(){
        return '<h1>Hello World</h1>';
    }

    public function helloName($nome){
        return '<h1>Hello Turma '.$nome.'</h1>';
    }

}
