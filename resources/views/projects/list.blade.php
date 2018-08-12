@extends('layout.base')

@section('heading')
  {{t('Projects')}}
@endsection

@section('content')
  @if (count($projects) > 0)
    <div class="ui list">
      @foreach ($projects as $project)
        <div class="item">
          <div class="ui grid">
            <div class="column"></div>
            <div class="four wide column">
              <a href="{{url('/projects/' . $project->id)}}">{{$project->description}}</a>
            </div>
            <div class="right aligned column">
              <a href="{{url('/projects/remove/' . $project->id)}}"><i class="times circle outline red icon"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no projects')}}.</div>
  @endif
@endsection
