@foreach ($tasks as $task)
    <div class="row justify-content-center t-center">
        <div class="col-md-1">
            {{ $task->id }}
        </div>
        <div class="col-md-5">
            <a title="{{__('Show')}}" href="{{ route('task.read', $task->id) }}">{{ $task->name }}</a>
        </div>
        <div class="col-md-2">
            {{ $task->created_at }}
        </div>
        <div class="col-md-2">
            {{ $task->updated_at }}
        </div>
        <div class="col-md-2">
            <a title="{{__('Show')}}" href="{{ route('task.read', $task->id) }}"><img src="/img/icons/icon-binoculars.svg" class="icon"></a>
            <a title="{{__('Edit')}}" href="{{ route('task.update', $task->id) }}"><img src="/img/icons/icon-pen.svg" class="icon"></a>
            <a title="{{__('Delete')}}" href="{{ route('task.delete', $task->id) }}"><img src="/img/icons/icon-trash.svg" class="icon"></a>
        </div>
    </div>
@endforeach
