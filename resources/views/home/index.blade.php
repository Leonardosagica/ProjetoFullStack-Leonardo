@extends('layouts.master')

@section('content')
    <h1>Hello Turma Flag</h1>
    <ul>
        <li><a href="{{ route('users.all') }}">Todos os utilizadores</a></li>
        <li><a href="{{ route('users.add') }}">Aqui podes adicionar utilizadores</a></li>
        <li><a href="{{ route('users.view') }}">ver um user</a></li>
        <li><a href="{{ route('welcome') }}">Vai para a Blade Welcome</a></li>
    </ul>

    <h1>Olá, {{ $hello }}</h1>

    <h1>Olá, {{ $turma }}</h1>
@endsection
