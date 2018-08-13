@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Project')}}</div>
    <div class="right aligned column">
      <a href="{{url('/projects/edit/' . $project->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui top attached segment">
    <div class="ui two column grid">
      <div class="column"><h3>{{$project->description}}</h3></div>
      <div class="right aligned column">
        <a href="{{url('/projects/assign/' . $project->id)}}"><i class="object group icon"></i></a>
        <a href="{{url('/tasks/add/project/' . $project->id)}}"><i class="plus icon"></i></a>
      </div>
    </div>
  </div>
  <div class="ui bottom attached segment">
    @if (count($project->tasks()) > 0)
      <div class="ui list">
        @foreach ($project->tasks() as $task)
          @include('tasks.insert')
        @endforeach
      </div>
    @endif
  </div>
@endsection
