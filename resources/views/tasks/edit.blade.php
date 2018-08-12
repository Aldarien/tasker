@extends('layout.base')

@section('heading')
  {{t('Edit Task')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/tasks/' . $task->id)}}">
    <div class="field">
      <label>{{t('Title')}}</label>
      <input type="text" name="title" value="{{$task->title}}" />
    </div>
    <div class="field">
      <label>{{t('Description')}}</label>
      <textarea name="description" rows="5">{{$task->description}}</textarea>
    </div>
    <button type="submit" class="ui button">{{t('Edit')}}</button>
  </form>
@endsection
