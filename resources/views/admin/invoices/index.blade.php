<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            background-color: #f8f9fa;
            padding-top: 60px; /* Adjust based on your navbar height */
        }
        .container {
            margin-top: 30px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through orders here -->
                                @foreach($order as $orders)
                                <tr>
                                    <td>{{ $orders->id }}</td>
                                    <td>{{ $orders->user->name }}</td>
                                    <td>{{ $orders->created_at->format('Y-m-d') }}</td>
                                    <td><span class="badge badge-primary">{{ $orders->status->name }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.invoices.create', ['orderId' => $orders->id]) }}" class="btn btn-primary btn-sm">Generate Invoice</a>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Repeat rows for each order -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
