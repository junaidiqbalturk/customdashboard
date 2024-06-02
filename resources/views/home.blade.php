@extends('layouts.app')


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