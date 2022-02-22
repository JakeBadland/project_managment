@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Create project')}}</h3>

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form method="POST" action="{{ route('project.create') }}">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group mb-3">
                            <label for="project-name">{{__('Name')}}:</label>
                            <input type="text" class="form-control" id="project-name" name="name" value="" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <div>
                                <label for="project-desc">{{__('Description')}}:</label>
                            </div>
                            <textarea id="project-desc" name="description"></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="is_private" type="checkbox" id="project_private">
                            <label class="form-check-label" for="project_private">
                                {{ __('Is project private?') }}
                            </label>
                        </div>

                        @if ($errors->has('error'))
                            <div class="form-group mb-3">
                                <span class="text-danger">{{ $errors->first('error') }}</span>
                            </div>
                        @endif

                        <div class="t-center mt-20">
                            <button type="submit" class="btn btn-dark btn-block">{{__('Submit')}}</button>
                            <button type="submit" onclick="history.back()" class="btn btn-dark btn-block">{{__('Back')}}</button>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </main>
@endsection
