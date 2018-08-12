@extends('layout.base')

@section('heading')
  {{t('Edit Project')}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/projects/' . $project->id)}}">
    <div class="field">
      <label>{{t('Description')}}</label>
      <input type="text" name="description" value="{{$project->description}}" />
    </div>
    <button type="submit" class="ui button">{{t('Edit')}}</button>
  </form>
@endsection
