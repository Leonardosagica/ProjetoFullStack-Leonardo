@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Olá. Aqui podes adicionar users.</h2>
        <form method="POST" action="{{ route('users.create') }}">
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
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" value="" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                @error('email')
                    pf coloque um email único
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" value="" type="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                    pf coloque uma password com mais de 6 caracteres
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
