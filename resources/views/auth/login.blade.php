@extends('app')
@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="card">
                        <h3 class="card-header text-center">{{__('Sign in')}}</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="{{__('Email')}}" id="email" class="form-control" name="email" required autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="{{__('Password')}}" id="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">{{__('Sign in')}}</button>
                                    </div>
                                </div>
                                @if ($errors->has('error'))
                                    <div class="form-group mb-3">
                                        <span class="text-danger">{{ $errors->first('error') }}</span>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
