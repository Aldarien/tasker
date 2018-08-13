@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Place')}}</div>
    <div class="right aligned column">
      <a href="{{url('/places/edit/' . $place->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui top attached segment">
    <div class="ui two column grid">
      <div class="column"><h3>{{$place->description}}</h3></div>
      <div class="right aligned column">
        <a href="{{url('/places/assign/' . $place->id)}}"><i class="object group icon"></i></a>
        <a href="{{url('/tasks/add/place/' . $place->id)}}"><i class="plus icon"></i></a>
      </div>
  </div>
  <div class="ui bottom attached segment">
    @if (count($place->tasks()) > 0)
      <div class="list">
        @foreach ($place->tasks() as $task)
          @include('tasks.insert')
        @endforeach
      </div>
    @endif
  </div>
@endsection
