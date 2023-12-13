@extends('layouts.master')


@section('content')
    <h2>Olá. Aqui iremos mostrar todos os utilizadores</h2>
    Os utilizadores são:

    {{-- Users --}}
    <ul>
        <li> {{ $users[0] }} a tarefa é {{ $tasks[1] }}</li>
        <li> {{ $users[1] }}</li>
        <li>{{ $users[2] }} tem {{ $contactInfo['age'] }}</li>
    </ul>


    {{-- Contactos --}}
    <ul>
        @foreach ($contacts as $contact)
            <li>{{ $contact[1] }} e o telefone é {{ $contact[2] }}</li>
        @endforeach
    </ul>


    <h1>Testes de Mysql</h1>
    <h4>{{-- $dbusers->name --}} - {{-- $dbusers->email --}}</h4>

    <h4>Todos os Users</h4>
    <ul>
        @foreach ($allDbUsers as $item)
            <li>{{ $item->name }} e o email é {{ $item->email }}</li>
        @endforeach

    </ul>
@endsection
