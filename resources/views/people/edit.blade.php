@extends('layout.base')

@section('heading')
  {{t('Edit Person')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/people/' . $person->id)}}">
    <div class="field">
      <label>{{t('Names')}}</label>
      <input type="text" name="names" value="{{$person->names}}"/>
    </div>
    <div class="field">
      <label>{{t('Last Name')}}</label>
      <input type="text" name="last_name" value="{{$person->last_name}}" />
    </div>
    <div class="field">
      <label>{{t('Second Last Name')}}</label>
      <input type="text" name="last_name2" value="{{$person->last_name2}}" />
    </div>
    <button type="submit" class="ui button">{{t('Edit')}}</button>
  </form>
@endsection
