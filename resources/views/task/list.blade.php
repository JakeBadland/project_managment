@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Tasks')}}</h3>

            {{--
            <div class="row justify-content-center table-header t-center">
                <div class="col-md-1">
                    ID
                </div>
                <div class="col-md-5">
                    {{__('Name')}}
                </div>
                <div class="col-md-2">
                    {{__('Created at')}}
                </div>
                <div class="col-md-2">
                    {{__('Updated at')}}
                </div>
                <div class="col-md-2">
                    {{__('Actions')}}
                </div>
            </div>
            --}}

            @if (!count($tasks))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        {{__('Project have no tasks')}}
                    </div>
                </div>
            @else

                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="status-new" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab" aria-controls="new" aria-selected="true">{{__('Open')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#progress" type="button" role="tab" aria-controls="progress" aria-selected="false">{{__('In progress')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#testing" type="button" role="tab" aria-controls="testing" aria-selected="false">{{__('Testing')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#done" type="button" role="tab" aria-controls="done" aria-selected="false">{{__('Done')}}</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="home-tab">
                        @include('task\blocks\sublist', array('tasks' => $tasks['new']))
                    </div>
                    <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="profile-tab">
                        @include('task\blocks\sublist', array('tasks' => $tasks['in_progress']))
                    </div>
                    <div class="tab-pane fade" id="testing" role="tabpanel" aria-labelledby="contact-tab">
                        @include('task\blocks\sublist', array('tasks' => $tasks['testing']))
                    </div>
                    <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="contact-tab">
                        @include('task\blocks\sublist', array('tasks' => $tasks['done']))
                    </div>
                </div>
            @endif

            </div>

            <div class="t-center mt-20">
                <a href="/project/read/{{ $project_id }}"><button type="button" class="btn btn-dark btn-block">{{__('Back')}}</button></a>
            </div>
        </div>
    </main>
@endsection
