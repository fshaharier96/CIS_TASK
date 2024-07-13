

@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Forget Password</h3>
                        @if(Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif

                       

                        <form action="{{route('forget_password.post')}}" method="post">
                            @csrf

                            <div class="mb-3 text-">
                             Enter your email address and we will send you a link to reset your password
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email"  name="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                          
                           
                            <button type="submit" class="btn btn-secondary w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection