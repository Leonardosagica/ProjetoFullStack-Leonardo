@extends('layouts.master')


@section('content')
    <h1>Aqui tens todas as Tarefas</h1>

    <ul>
        @foreach ($tasks as $item)
            <li>{{ $item[1] }}</li>
        @endforeach
    </ul>
@endsection
