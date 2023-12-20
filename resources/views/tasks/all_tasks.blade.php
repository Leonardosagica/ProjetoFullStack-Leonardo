@extends('layouts.master')


@section('content')
    <div class="container">
        <h1>Aqui tens todas as Tarefas</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbTasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->user_name }}</td>
                        <td> <a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver Tarefa</a></td>
                        <td>
                            <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar Tarefa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <ul>
            @foreach ($tasks as $item)
                <li>{{ $item[1] }}</li>
            @endforeach
        </ul>
    </div>
@endsection
