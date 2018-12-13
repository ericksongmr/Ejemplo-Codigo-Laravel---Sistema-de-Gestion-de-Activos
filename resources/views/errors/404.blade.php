@extends('errors.template.main')
@section('title', 'No se encontraron resultados!')

@section('content')
    <div class="title">¡No se encontraron Resultados!</div>
    <img src="{{asset('app/img/error.png')}}">
@endsection