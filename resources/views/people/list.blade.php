@extends('layout.base')

@section('heading')
  {{t('People')}}
@endsection

@section('content')
  @if (count($people) > 0)
    <div class="ui list">
      @foreach ($people as $person)
        <div class="item">
          <a href="{{url('/people/' . $person->id)}}">{{$person->name()}}</a>
          <div class="right aligned column"><a href="{{url('/people/remove/' . $person->id)}}"><i class="remove icon"></i></a></div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no people')}}.</div>
  @endif
@endsection
