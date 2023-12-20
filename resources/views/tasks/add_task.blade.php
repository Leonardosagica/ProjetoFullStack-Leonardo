@extends('layouts.master')

@section('content')
    <h1>Aqui vais adicionar tarefas</h1>
    <div class="container">
        <form method="POST" action="{{ route('tasks.create') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" value="" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('name')
                    pf coloque um nome
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                <input name="description" value="" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">User</label><br>
                <select name="user_id" id="">
                    <option value="">Seleccione um user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
                @error('user_id')
                    <div class="alert alert-danger">
                        Pf associe a um user que exista
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
@endsection
