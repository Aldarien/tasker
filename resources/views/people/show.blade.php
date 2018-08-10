@extends('layout.base')

@section('heading')
  {{t('Person')}}
@endsection

@section('content')
  <div class="ui segment">
    {{$person->name()}}
  </div>
@endsection
