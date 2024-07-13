@if(Session::has('error'))
<p class="text-danger">{{ Session::get('error')}}</p>
@endif

<!-- @if($errors->has('name'))

<p class="text-danger">{{$errors->first('name')}}</p>

@endif -->

@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Register</h3>
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input required type="text" name="name" class="form-control" id="name" placeholder="Enter your full name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input required type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input required  type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input required type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection