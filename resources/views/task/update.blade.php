@php
    use App\Models\Task;
@endphp

@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Update task')}}</h3>

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form method="POST" action="{{ route('task.update', $task->id) }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="mb-3" for="project-name">{{__('Name')}}:</label>
                            <input type="text" class="form-control" id="project-name" name="name" value="{{ $task->name }}" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <div>
                                <label class="mb-3" for="project-desc">{{__('Description')}}:</label>
                            </div>
                            <textarea id="project-desc" name="description">{{ $task->description }}</textarea>
                        </div>

                        @if ($task->file_name)
                            <div class="form-group mb-3">
                                <label for="project-name">{{__('Current file')}}: {{ $task->file_name }}</label>
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <label class="mb-3">{{ __('Status') }}:</label>
                            <select class="form-select" name="status">
                                @foreach(Task::$statuses as $key => $status)
                                    <option @if ($task->status == $key) selected @endif value="{{$key}}">{{ __($status) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <input type="file" name="file_name" class="form-control">
                        </div>

                        <div class="t-center mt-20">
                            <button type="submit" class="btn btn-dark btn-block">{{__('Submit')}}</button>
                            <a href="/task/{{ $task->project_id }}"><button type="button" class="btn btn-dark btn-block">{{__('Back')}}</button></a>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </main>
@endsection
