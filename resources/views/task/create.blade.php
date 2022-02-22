@extends('app')
@section('content')
    <main class="dashboard">
        <div class="container">
            <h3 class="text-center table-head">{{__('Create task')}}</h3>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('task.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project_id }}">
                        <div class="form-group mb-3">
                            <label for="task-name">{{__('Name')}}:</label>
                            <input type="text" class="form-control" id="task-name" name="name" value="" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <div>
                                <label for="task-desc">{{__('Description')}}:</label>
                            </div>
                            <textarea id="task-desc" name="description"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <input type="file" name="file" class="form-control">
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
