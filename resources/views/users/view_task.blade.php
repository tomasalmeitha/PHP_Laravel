@extends('layouts.main')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div class="container">
        <h1>Detalhes da Tarefa</h1>
        <h3>Nome:{{ $ourTask->name }}</h3>
        <h3>Descrição:{{ $ourTask->description }}</h3>

    </div>


    {{-- <h1> Vamos testar as variáveis!</h1>
    <h4>{{$aMinhaVariavel}}</h4> --}}
@endsection


@section('endcontent')
    {{-- <h2>sou fim do conteúdo</h2> --}}
@endsection
