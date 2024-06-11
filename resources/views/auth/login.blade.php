@extends('layouts.app')
<link href="{{ asset('resources/css/custom.css') }}" rel="stylesheet">
@vite(['resources/css/custom.css', 'resources/js/app.js'])

@section('content')
<div class="container">
  @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('sucess')   }}</div>
  @endif

  @if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error')  }} </div>
  @endif
    <div class="title">Login</div>
    <div class="content">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name ="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name='password' placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="{{ __('Login') }}">
        </div>
      </form>
    </div>
  </div>
@endsection
