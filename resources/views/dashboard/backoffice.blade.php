@php
    use App\Models\User;
@endphp


@extends('layouts.main')

@section('title')
    <title>Home</title>
@endsection



@section('content')
    <div class="container">
        <h1>Dashboard</h1>


        <h4>Olá {{ Auth::user()->name}}

           {{-- @php dd(Auth::user()->user-type)
           @endphp --}}
        @if (Auth::user()->user-type == User::userAdmin)
            <div class="alert alert-success">
                Administrador furiro
            </div>
        @endif

        </h4>
        
    </div>


    {{--<h1> Vamos testar as variáveis!</h1>
    <h4>{{$aMinhaVariavel}}</h4>--}}
@endsection


@section('endcontent')
    {{-- <h2>sou fim do conteúdo</h2> --}}
@endsection

{{-- @if ($user->user_type === 1)
    <div class="alert alert-info">Conta de Administrador</div>
@endif
Olá, {{ $user->name }} --}}