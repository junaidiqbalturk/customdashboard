@extends('layouts.app')
<link href="{{ asset('resources/css/custom.css') }}" rel="stylesheet">
@vite(['resources/css/custom.css', 'resources/js/app.js'])

@section('content')
<div class="container">
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
            <input type="text" ='password' placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="{{ __('Login') }}">
        </div>
      </form>
    </div>
  </div>
@endsection
