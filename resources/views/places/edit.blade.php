@extends('layout.base')

@section('heading')
  {{t('Edit Place')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/places/' . $place->id)}}">
    <div class="field">
      <label>{{t('Description')}}</label>
      <input type="text" name="description" value="{{$place->description}}" />
    </div>
    <button type="submit" class="ui button">{{t('Edit')}}</button>
  </form>
@endsection
