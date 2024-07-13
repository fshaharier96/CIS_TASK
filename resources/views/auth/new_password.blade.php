@if(Session::has('error'))
<p class="text-danger">{{ Session::get('error')}}</p>
@endif

{{-- @if($errors->has('name'))

<p class="text-danger">{{$errors->first('name')}}</p>

@endif --}}

@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Change Password</h3>
                        <form action="{{route('reset_password.post')}}" method="post">
                            @csrf
                            <input type="text" name="token" hidden value="{{ $token}}"/>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection