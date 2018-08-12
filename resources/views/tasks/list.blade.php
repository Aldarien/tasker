@extends('layout.base')

@section('heading')
  {{t('Tasks')}}
@endsection

@section('content')
  @if (count($tasks) > 0)
    <div class="ui list">
      @foreach ($tasks as $task)
        <div class="item">
          <div class="ui grid">
            <div class="column"></div>
            <div class="four wide column">
              <a href="{{url('/tasks/' . $task->id)}}" class="content">{{$task->title}}</a>
              <div class="content">{{$task->description}}</div>
            </div>
            <div class="right aligned column">
              <a href="{{url('/tasks/remove/' . $task->id)}}"><i class="times circle outline red icon"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no tasks')}}.</div>
  @endif
@endsection
