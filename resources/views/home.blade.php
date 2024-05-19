@extends('layout')

@section('title', 'Home')

@section('layout')

    <h1>Home</h1>
    {{$name}}
    {{$test ?? 'Variavel teste não existe'}}
    {{isset($record)? 'Existe' : 'Não existe'}}

    
@endsection