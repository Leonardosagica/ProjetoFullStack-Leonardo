@extends('layouts.master')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('users.update') }}">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="id" id="">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('name')
                    pf coloque um nome
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" value="{{ $user->phone }}" name="phone" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Morada</label>
                <input type="text" value="{{ $user->address }}" name="address" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input disabled name="email" value="{{ $user->email }}" type="email" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    pf coloque um email único
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" value="{{ $user->password }}" type="password" class="form-control"
                    id="exampleInputPassword1">
                @error('password')
                    <div class="alert alert-danger">
                        pf coloque uma password com mais de 6 caracteres
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
