@extends('layouts.app')
@section('content')
<h3 class="text-dark ms-4 mt-2">Welcome to dashboard : {{ Auth::user()->name}}</h3>

@endsection