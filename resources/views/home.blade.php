@extends('layout.base')

@section('heading')
Inicio
@endsection

@section('content')
Bienvenid@

@if (isset($tasks))
  @include('tasks')
@endif
@endsection
