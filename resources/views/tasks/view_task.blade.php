@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Sou os detalhes de uma tarefa</h4>

        <h6>Name: {{ $task->name }}</h6>
        <h6>Descrição:{{ $task->description }}</h6>
        <h6>Data de Conclusão: {{ $task->due_at }}</h6>
        <h6>Status: {{ $task->status }}</h6>
    </div>
@endsection
