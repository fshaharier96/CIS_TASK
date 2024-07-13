

@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        @if(Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        @if(Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @endif
                        
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input required type="email"  name="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input required type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div> --}}

                            <div class="mb-3 ">
                                <a class="text-decoration-none" href="{{route('forget_password')}}">Forget Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection