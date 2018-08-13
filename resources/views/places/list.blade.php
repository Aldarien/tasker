@extends('layout.base')

@section('heading')
  {{t('Places')}}
@endsection

@section('content')
  @if (count($places) > 0)
    <div class="ui celled list">
      @foreach ($places as $place)
        <div class="item">
          <a class="content" href="{{url('/places/' . $place->id)}}">{{$place->description}}</a>
          <div class="right floated content">
            <a href="{{url('/places/remove/' . $place->id)}}"><i class="times circle outline red icon"></i></a>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="ui warning segment">{{t('There are no places')}}. <a href="{{url('/places/add')}}"><i class="plus icon"></i>{{t('Add')}}</a></div>
  @endif
@endsection
