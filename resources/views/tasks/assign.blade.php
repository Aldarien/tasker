@extends('layout.base')

@section('heading')
  {{t('Assign Task')}} - {{$task->title}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/tasks/assign/' . $task->id)}}">
    <div class="field">
      <label>{{t('Asociated')}}</label>
      <div class="ui selection dropdown form_dropdown">
        <input type="hidden" name="asociated" />
        <i class="dropdown icon"></i>
        <div class="default text">{{t('Asociated')}}</div>
        <div class="menu">
          <div class="header">{{t('People')}}</div>
          @foreach ($people as $person)
          <div class="item" data-value="person-{{$person->id}}">{{$person->name()}}</div>
          @endforeach
          <div class="header">{{t('Places')}}</div>
          @foreach ($places as $place)
          <div class="item" data-value="place-{{$place->id}}">{{$place->description}}</div>
          @endforeach
          <div class="header">{{t('Projects')}}</div>
          @foreach ($projects as $project)
          <div class="item" data-value="project-{{$project->id}}">{{$project->description}}</div>
          @endforeach
        </div>
      </div>
    </div>
    <button class="ui button" type="submit">{{t('Assign')}}</button>
  </form>
@endsection

@push('scripts')
  <script type="text/javascript">
  $('.ui.dropdown.form_dropdown').dropdown({
    action: 'activate'
  });
  </script>
@endpush
