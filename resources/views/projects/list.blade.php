@extends('layout.base')

@section('heading')
  {{t('Projects')}}
@endsection

@section('content')
  @if (count($projects) > 0)
    <div class="ui celled list">
      @foreach ($projects as $project)
        <div class="item">
          <a class="content" href="{{url('/projects/' . $project->id)}}">{{$project->description}}</a>
          <div class="right floated content">
            <a href="{{url('/projects/remove/' . $project->id)}}"><i class="times circle outline red icon"></i></a>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no projects')}}. <a href="{{url('/projects/add')}}"><i class="plus icon"></i>{{t('Add')}}</a></div>
  @endif
@endsection
