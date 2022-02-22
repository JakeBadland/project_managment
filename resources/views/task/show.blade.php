@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Task')}}</h3>

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="row p-10">
                        <div class="col-md-12">
                            ID: {{ $task->id }}
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-md-12">
                            {{__('Name')}}: {{ $task->name }}
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-md-12">
                            {{__('Description')}}: {{ $task->description }}
                        </div>
                    </div>

                    @if ($task->file_name)
                        <div class="row p-10">
                            <div class="col-md-12">
                                {{__('File')}}:
                                <a href="/uploads/{{ $task->file_name }}">
                                    {{ $task->file_name }}
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="mt-20 col-md-6">
                    <a class="link" href="{{ route('task.index', $task->project_id) }}">{{ __('Tasks list') }}</a>
                    {{--<a class="link ml-20" href="{{ route('task.create', $project->id) }}">{{ __('Create task') }}</a>--}}
                </div>
            </div>

            <div class="t-center mt-20">
                <button type="submit" onclick="history.back()" class="btn btn-dark btn-block">{{__('Back')}}</button>
            </div>
        </div>
    </main>
@endsection
