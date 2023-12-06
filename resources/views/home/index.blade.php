@extends('layouts.master')

@section('content')
    <h1>Hello Turma Flag</h1>
    <ul>
        <li><a href="{{ route('users.all') }}">Todos os utilizadores</a></li>
        <li><a href="{{ route('users.add') }}">Aqui podes adicionar utilizadores</a></li>
        <li><a href="{{ route('welcome') }}">Vai para a Blade Welcome</a></li>
    </ul>


    @php
        $hello = 'Estamos On e vamos ser os melhores programadores de Laravel';
    @endphp

    <h1>Olá, {{ $hello }} sdsds</h1>
@endsection
