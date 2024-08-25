@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
@stop

@section('content')

    <grafico-component
    :name="'{{ auth()->user()->name }}'"
    :rol="'{{ auth()->user()->role }}'" 
    :tuser="'{{ $tuser }}'" 
    :tdisp="'{{ $tdisp }}'" 
    :temployee="'{{ $temployee }}'">
    </grafico-component>

@stop

@section('css')
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite('resources/sass/app.scss')
    {{-- @vite('resources/js/app.js') --}}
@stop

@section('js')
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @vite('resources/js/app.js')
@stop
