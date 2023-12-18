@extends('layouts.master')

@section('content')
    <div class="container">
        <h6>cucu, vamos ver um utilizador</h6>
        <h6>Nome: {{ $user->name }} </h6>
        <h6>Email: {{ $user->email }} </h6>
        <h6>Telefone: {{ $user->phone }} </h6>
    </div>
@endsection
