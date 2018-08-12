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
  <div class="ui segment">
    {{$project->description}}
  </div>
@endsection
