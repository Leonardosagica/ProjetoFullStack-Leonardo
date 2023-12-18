@extends('layouts.master')


@section('content')
    <div class="container">
        {{-- <h2>Olá. Aqui iremos mostrar todos os utilizadores</h2>
        Os utilizadores são:

        {{-- Users --}}
        {{-- <ul>
            <li> {{ $users[0] }} a tarefa é {{ $tasks[1] }}</li>
            <li> {{ $users[1] }}</li>
            <li>{{ $users[2] }} tem {{ $contactInfo['age'] }}</li>
        </ul> --}}


        {{-- Contactos --}}
        {{-- <ul>
            @foreach ($contacts as $contact)
                <li>{{ $contact[1] }} e o telefone é {{ $contact[2] }}</li>
            @endforeach
        </ul> --}}


        {{-- <h1>Testes de Mysql</h1>
        <h4> $dbusers->name - $dbusers->email </h4>

        <h4>Todos os Users</h4>
        <ul>
            @foreach ($allDbUsers as $item)
                <li>{{ $item->name }} e o email é {{ $item->email }}</li>
            @endforeach
        </ul> - --}}

        <h4>Todos os Users</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Password</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allDbUsers as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->password }}</td>
                        <td> <a href="{{ route('users.view', $item->id) }}" class="btn btn-info">Ver Utilizador</a></td>
                        <td> <a href="{{ route('users.delete', $item->id)}}" class="btn btn-danger">Apagar Utilizador</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
