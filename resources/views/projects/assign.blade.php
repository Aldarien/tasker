@extends('layout.base')

@section('heading')
  {{t('Assign Task')}} - {{t('Project')}} {{$project->description}}
@endsection

@section('content')
  <form class="ui form" method="post" action="{{url('/projects/assign/' . $project->id)}}">
    <div class="field">
      <label>{{t('Task')}}</label>
      <div class="ui selection dropdown form_dropdown">
        <input type="hidden" name="task" />
        <i class="dropdown icon"></i>
        <div class="default text">{{t('Task')}}</div>
        <div class="menu">
        @foreach ($tasks as $task)
          <div class="item" data-value="{{$task->id}}">{{$task->title}}</div>
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
