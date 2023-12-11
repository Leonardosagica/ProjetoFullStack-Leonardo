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
@endsection
