@php
use Illuminate\Support\Facades\Session;
@endphp

@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Projects')}}</h3>

            @if(Session::has('error'))
                <div class="form-group mb-3">
                    <span class="text-danger">{{ __(Session::get('error')) }}</span>
                </div>
            @endif

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

            @if (!count($projects))
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        {{__('You have no projects')}}
                    </div>
                </div>
            @else

                @foreach ($projects as $project)
                    <div class="row justify-content-center t-center">
                        <div class="col-md-1">
                            {{ $project->id }}
                        </div>
                        <div class="col-md-5">
                            <a title="{{__('Show')}}" href="{{ route('project.read', $project->id) }}">{{ $project->name }}</a>
                        </div>
                        <div class="col-md-2">
                            {{ $project->created_at }}
                        </div>
                        <div class="col-md-2">
                            {{ $project->updated_at }}
                        </div>
                        <div class="col-md-2">
                            <a title="{{__('Show')}}" href="{{ route('project.read', $project->id) }}"><img src="/img/icons/icon-binoculars.svg" class="icon"></a>
                            <a title="{{__('Edit')}}" href="{{ route('project.update', $project->id) }}"><img src="/img/icons/icon-pen.svg" class="icon"></a>
                            <a title="{{__('Delete')}}" href="{{ route('project.delete', $project->id) }}"><img src="/img/icons/icon-trash.svg" class="icon"></a>
                        </div>
                    </div>
                @endforeach

            @endif

            <div class="mt-20">
                <a class="link" href="{{ route('project.create') }}">{{ __('Create project') }}</a>
            </div>
        </div>
    </main>
@endsection
