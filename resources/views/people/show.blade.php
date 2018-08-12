@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Person')}}</div>
    <div class="right aligned column">
      <a href="{{url('/people/edit/' . $person->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui segment">
    {{$person->name()}}
  </div>
@endsection
