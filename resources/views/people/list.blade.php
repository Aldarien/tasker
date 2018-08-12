@extends('layout.base')

@section('heading')
  {{t('People')}}
@endsection

@section('content')
  @if (count($people) > 0)
    <div class="ui list">
      @foreach ($people as $person)
        <div class="item">
          <div class="ui grid">
            <div class="column"></div>
            <div class="four wide column">
              <a href="{{url('/people/' . $person->id)}}">{{$person->name()}}</a>
            </div>
            <div class="right aligned column">
              <a href="{{url('/people/remove/' . $person->id)}}"><i class="times circle outline red icon"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no people')}}.</div>
  @endif
@endsection
