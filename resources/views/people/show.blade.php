@extends('layout.base')

@section('heading')
  <div class="ui two column grid">
    <div class="column">{{t('Person')}}</div>
    <div class="right aligned column">
      <a href="{{url('/people/edit/' . $person->id)}}"><i class="edit icon"></i></a>
    </div>
  </div>
@endsection

@section('content')
  <div class="ui top attached segment">
    <div class="ui two column grid">
      <div class="column"><h3>{{$person->name()}}</h3></div>
      <div class="right aligned column">
        <a href="{{url('/people/assign/' . $person->id)}}"><i class="object group icon"></i></a>
        <a href="{{url('/tasks/add/person/' . $person->id)}}"><i class="plus icon"></i></a>
      </div>
    </div>
  </div>
  <div class="ui bottom attached segment">
    @if (count($person->tasks()) > 0)
      <div class="ui list">
        @foreach ($person->tasks() as $task)
          @include('tasks.insert')
        @endforeach
      </div>
    @endif
  </div>
@endsection
