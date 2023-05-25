@extends('layouts.main')

@section('title')
    <title>Adicionar Users</title>
@endsection

@section('content')
    <h1>Olá,sou a página para adicionar utilizadores</h1>

    <div class="container">
    <form method="POST" action="{{route('create_user')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input name="name" type="text" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

            @error('email')
            <div id="emailHelp" class="form-text">Insira um email válido</div>
            @enderror

        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        @error('password')
        <div id="emailHelp" class="form-text">Insira um password válida</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <a href="{{ route('home') }}">Voltar</a>

@endsection
