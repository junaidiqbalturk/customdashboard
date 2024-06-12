@extends('layouts.app')
<link href="{{ asset('resources/css/dashboard.css') }}" rel="stylesheet">

@section('content')
<div class="container dashboard-container">
    <div class="row text-center">
        <!-- User Name Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user"></i> {{ Auth::user()->name }}</h5>
                </div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <a href="{{ route('profile') }}" class="btn btn-primary w-100"><i class="fas fa-id-badge"></i>View Profile</a>
                </div>
            </div>
        </div>

        <!-- Place Your Order Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <a href="#placeOrder" class="btn btn-primary w-100"><i class="fas fa-shopping-cart"></i> Place Your Order</a>
                </div>
            </div>
        </div>

        <!-- Update Information Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <a href="#updateInfo" class="btn btn-primary w-100"><i class="fas fa-edit"></i> Update Information</a>
                </div>
            </div>
        </div>

        <!-- Order History Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <a href="#orderHistory" class="btn btn-primary w-100"><i class="fas fa-history"></i> Order History</a>
                </div>
            </div>
        </div>

        <!-- Logout Card -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout w-100"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>