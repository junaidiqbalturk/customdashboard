<!-- resources/views/order_history.blade.php -->
@extends('layouts.app')
<style>
    /* public/css/styles.css */

body {
    font-family: Arial, sans-serif;
}

.container {
    margin-top: 20px;
}

.navbar {
    margin-bottom: 20px;
}

.table thead {
    background-color: #f8f9fa;
}

.table th,
.table td {
    vertical-align: middle;
}

.btn-primary,
.btn-info {
    margin-right: 5px;
}

img {
    max-width: 100%;
    height: auto;
}

</style>
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Order History</h1>
        <a href="{{ route('custom-order.create') }}" class="btn btn-primary">New Order</a>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Phone Number</th>
                    <th>Digitizing Type</th>
                    <th>Height</th>
                    <th>Width</th>
                    <th>Placement</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->country }}</td>
                        <td>{{ $order->phonenumber }}</td>
                        <td>{{ $order->digitizing_type }}</td>
                        <td>{{ $order->height }}</td>
                        <td>{{ $order->width }}</td>
                        <td>{{ $order->placement }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            @if($order->image_path)
                                <img src="{{ asset('storage/' . $order->image_path) }}" alt="Order Image" style="width: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">View Order</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
