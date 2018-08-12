@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Place')}}</div>
    <div class="right aligned column">
      <a href="{{url('/places/edit/' . $place->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui segment">
    {{$place->description}}
  </div>
@endsection
