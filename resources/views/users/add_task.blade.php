@extends('layouts.main')

@section('title')
    <title>Adicionar Tasks</title>
@endsection

@section('content')
    <h1>Olá,sou a página para adicionar tarefas</h1>

    <div class="container">
    <form method="POST" action="{{route('create_task')}}">
        <select class="custom-select" name="users_id">
            <option value="" selected>Todos os Contactos</option>
            @foreach ($allUsers as $item)
                <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" value="" id="exampleInputEmail1" aria-describedby="descricaoHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}

            @error('descricao')
            <div id="descricaoHelp" class="form-text">Insira a descrição da tarefa</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" value="" id="exampleInputEmail1" aria-describedby="descricaoHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}

            @error('descricao')
            <div id="descricaoHelp" class="form-text">Insira a descrição da tarefa</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

    </div>
    
    <a href="{{ route('home') }}">Voltar</a>

@endsection