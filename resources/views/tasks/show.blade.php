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
  <div class="ui top attached segment">
    <div class="ui header">{{$task->title}}</div>
    <div class="content">{{$task->description}}</div>
  </div>
  <div class="ui bottom attached segment">
    <div class="ui grid">
      <div class="row">
        <div class="seven wide column"><h4>{{t('Asociated')}}</h4></div>
        <div class="right aligned nine wide column">
          <a href="{{url('/tasks/assign/' . $task->id)}}"><i class="object group icon"></i></a>
        </div>
      </div>
    </div>
    <div class="ui list">
      @if (count($task->asociated()) > 0)
      @foreach ($task->asociated() as $asociated)
        <div class="item">
          @if (is_a($asociated, \Tasker\Person::class))
            <div class="header">{{t('Person')}}</div>
            <div class="content"><a href="{{url('/people/' . $asociated->id)}}">{{$asociated->name()}}</a></div>
          @elseif (is_a($asociated, \Tasker\Place::class))
            <div class="header">{{t('Place')}}</div>
            <a class="content" href="{{url('/places/' . $asociated->id)}}">{{$asociated->description}}</a>
          @elseif (is_a($asociated, \Tasker\Project::class))
            <div class="header">{{t('Project')}}</div>
            <a class="content" href="{{url('/projects/' . $asociated->id)}}">{{$asociated->description}}</a>
          @else
            <div class="header">{{t('Task')}}</div>
            <a class="content" href="{{url('/tasks/' . $asociated->id)}}">{{$asociated->title}}</a>
          @endif
        </div>
      @endforeach
      @endif
    </div>
  </div>
@endsection
