@extends('layouts.master')

@section('content')
    <h1>Hello Turma Flag</h1>
    <ul>
        <li><a href="{{ route('users.all') }}">Todos os utilizadores</a></li>
        <li><a href="{{ route('users.add') }}">Aqui podes adicionar utilizadores</a></li>
        <li><a href="{{ route('users.view') }}">ver um user</a></li>
        <li><a href="{{ route('welcome') }}">Vai para a Blade Welcome</a></li>
        <li><a href="{{route('tasks.all')}}">Todas as Tarefas</a></li>
    </ul>

    <h1>Olá, {{ $hello }}</h1>

    <h1>Olá, {{ $turma }}</h1>

    <h4>Informação da Flag</h4>
    <ul>
        <li>{{ $flagInfo['name'] }}</li>
        <li>{{ $flagInfo['address'] }}</li>
        <li>{{ $flagInfo['email'] }}</li>
    </ul>
@endsection
