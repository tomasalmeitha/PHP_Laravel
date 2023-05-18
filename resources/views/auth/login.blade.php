@extends('layouts.main')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <h1>Login</h1>

    <div class="container">
    <form method="POST" action="{{route('login')}}">
        @csrf
        {{-- <select class="custom-select" name="users_id">
            <option value="" selected>Todos os Contactos</option>
            @foreach ($allUsers as $item)
                <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select> --}}
        

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error("email")
              Email
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              @error("password")
              Pass
              @enderror
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
    
    <a href="{{ route('home') }}">Voltar</a>

@endsection