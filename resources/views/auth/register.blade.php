@extends('layouts.app')
<link href="{{ asset('resources/css/custom.css') }}" rel="stylesheet">
@vite(['resources/css/custom.css', 'resources/js/app.js'])
@section('content')
<div class="container">
    <div class="title">Customer Registration</div>
    <div class="content">
    <form method="POST" action="{{ route('register') }}">
          @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id ="name" name = "name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id = "uname" name="uname" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id = "email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" id="country" name="country" placeholder="Country" required>
          </div>
          <div class="input-box">
            <span class="details">Company Name</span>
            <input type="text" id = "companyname" name="companyname" placeholder="Company Name" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" id="caddress" name="caddress" placeholder="Company Address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="phonenumber" name = "phonenumber" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" id="password" name = "password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" id = "password_confirmation" name="password_confirmation"  placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="{{ __('Register') }}">
        </div>
      </form>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
  </div>

@endsection
