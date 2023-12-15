@extends('layouts.master')


@section('content')
    <div class="container">
        <h1>Aqui tens todas as Tarefas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbTasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->user_name }}</td>
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
