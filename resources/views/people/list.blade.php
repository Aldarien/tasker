@extends('layout.base')

@section('heading')
  {{t('People')}}
@endsection

@section('content')
  @if (count($people) > 0)
    <div class="ui celled list">
      @foreach ($people as $person)
        <div class="item">
          <a class="content" href="{{url('/people/' . $person->id)}}">{{$person->name()}}</a>
          <div class="right floated content">
            <a href="{{url('/people/remove/' . $person->id)}}"><i class="times circle outline red icon"></i></a>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no people')}}. <a href="{{url('/people/add')}}"><i class="plus icon"></i>{{t('Add')}}</a></div>
  @endif
@endsection
