<h4>{{t('Tasks')}}</h4>
<div class="ui celled list">
  @foreach ($tasks as $task)
    <div class="item">
      <div class="header"><a href="{{url('//tasks/' . $task->id)}}">{{$task->title}}</a></div>
      <div class="content">
        <div class="ui animated list">
        @foreach ($task->asociated() as $asoc)
          @if (is_a($asoc, \Tasker\Person::class))
            <a class="item" href="{{url('/people/' . $asoc->id)}}">{{$asoc->name()}}</a>
          @elseif (is_a($asoc, \Tasker\Task::class))
            <a class="item" href="{{url('/tasks/' . $asoc->id)}}">{{$asoc->title}}</a>
          @elseif (is_a($asoc, \Tasker\Place::class))
            <a class="item" href="{{url('/places/' . $asoc->id)}}">{{$asoc->description}}</a>
          @else
            <a class="item" href="{{url('/projects/' . $asoc->id)}}">{{$asoc->description}}</a>
          @endif
        @endforeach
        </div>
      </div>
    </div>
  @endforeach
</div>
