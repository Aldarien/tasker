@extends('layout.base')

@section('heading')
  {{t('Add Person')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/people/add')}}">
    <div class="field">
      <label>{{t('Names')}}</label>
      <input type="text" name="names" />
    </div>
    <div class="field">
      <label>{{t('Last Name')}}</label>
      <input type="text" name="last_name" />
    </div>
    <div class="field">
      <label>{{t('Second Last Name')}}</label>
      <input type="text" name="last_name2" />
    </div>
    <button type="submit" class="ui button">{{t('Add')}}</button>
  </form>
@endsection
