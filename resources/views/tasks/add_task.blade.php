@extends('layouts.master')

@section('content')

<h1>Aqui vais adicionar tarefas</h1>
<form method="POST" action="{{route('tasks.create')}}">
 @csrf

 
</form>
@endsection
