@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Project')}}</h3>

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="row p-10">
                        <div class="col-md-12">
                            ID: {{ $project->id }}
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-md-12">
                            {{__('Name')}}: {{ $project->name }}
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-md-12">
                            {{__('Description')}}: {{ $project->description }}
                        </div>
                    </div>

                    <div class="row p-10">
                        <div class="col-md-12">
                            {{__('Tasks')}}: {{ $tasks_count }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="mt-20 col-md-6">
                    <a class="link" href="{{ route('task.index', $project->id) }}">{{ __('Tasks list') }}</a>
                    <a class="link ml-20" href="{{ route('task.create', $project->id) }}">{{ __('Create task') }}</a>
                </div>
            </div>

            <div class="t-center mt-20">
                <button type="submit" onclick="history.back()" class="btn btn-dark btn-block">{{__('Back')}}</button>
            </div>
        </div>
    </main>
@endsection
