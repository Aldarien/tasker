@extends('layout.base')

@section('heading')
  {{t('Tasks')}}
@endsection

@section('content')
  @if (count($tasks) > 0)
    <div class="ui celled list">
      @foreach ($tasks as $task)
        <div class="item">
          <div class="right floated content">
            <a href="{{url('/tasks/remove/' . $task->id)}}"><i class="times circle outline red icon"></i></a>
          </div>
          <a href="{{url('/tasks/' . $task->id)}}" class="header">{{$task->title}}</a>
          <div class="content">{{$task->description}}</div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no tasks')}}. <a href="{{url('/tasks/add')}}"><i class="plus icon"></i>{{t('Add')}}</a></div>
  @endif
@endsection
