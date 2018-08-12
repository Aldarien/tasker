@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Task')}}</div>
    <div class="right aligned column">
      <a href="{{url('/tasks/edit/' . $task->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui segment">
    <div class="header">{{$task->title}}</div>
    <div class="content">{{$task->description}}</div>
  </div>
  <div class="ui top attached segment">
    <div class="ui grid">
      <div class="row">
        <div class="right aligned sixteen wide column">
          <a href="{{url('/tasks/assign/' . $task->id)}}"><i class="object group icon"></i></a>
        </div>
      </div>
      @if (count($task->asociated()) > 0)
      @foreach ($task->asociated() as $asociated)
        <div class="row">
          {{d($asociated)}}
        </div>
      @endforeach
      @endif
    </div>
  </div>
@endsection
