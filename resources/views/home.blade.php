@extends('layouts.app')
<link href="{{ asset('resources/css/dashboard.css') }}" rel="stylesheet">
 <!-- Bootstrap JS and dependencies -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS styles -->
    <!-- Add any additional CSS stylesheets here -->
</head>

@section('content')
<div class="container-fluid">
    <!-- Dashboard content -->
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar -->
            <div class="card">
                <div class="card-body">
                    <!-- Sidebar content -->
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#profile">Profile</a></li>
                        <li class="list-group-item"><a href="#placeOrder">Place Your Order</a></li>
                        <li class="list-group-item"><a href="#orderHistory">Order History</a></li>
                        <li class="list-group-item"><a href="#updateInfo">Update Information</a></li>
                        <li class="list-group-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Main content -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dashboard</h5>
                    <p class="card-text">Welcome to your dashboard.</p>
                    <!-- Add more content here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection