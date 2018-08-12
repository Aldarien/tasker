@extends('layout.base')

@section('heading')
  {{t('Add Project')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/projects/add')}}">
    <div class="field">
      <label>{{t('Description')}}</label>
      <input type="text" name="description" />
    </div>
    <button type="submit" class="ui button">{{t('Add')}}</button>
  </form>
@endsection
