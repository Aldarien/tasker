@extends('layout.base')

@section('heading')
  {{t('Add Task')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/tasks/add')}}">
    @if (isset($asociated))
      <input type="hidden" name="asociated" value="{{$asociated}}" />
    @endif
    <div class="field">
      <label>{{t('Title')}}</label>
      <input type="text" name="title" />
    </div>
    <div class="field">
      <label>{{t('Description')}}</label>
      <textarea name="description" rows="5"></textarea>
    </div>
    <button type="submit" class="ui button">{{t('Add')}}</button>
  </form>
@endsection
