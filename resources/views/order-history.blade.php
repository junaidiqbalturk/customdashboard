<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
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

.animated {
    opacity: 0;
    transition: opacity 0.5s ease; /* Adjust timing as needed */
}

.animated.show {
    opacity: 1;
}

.btn-primary,
.btn-info {
    margin-right: 5px;
}

img {
    max-width: 100%;
    height: auto;
}
.order-status-container {
    overflow: hidden; /* Ensure status text doesn't overflow */
    background-color: #ff4d4d; /* Red background color */
    padding: 10px; /* Adjust padding */
    border-radius: 5px; /* Rounded corners */
}

.order-status {
    text-align: center; /* Center-align the status text */
}

.status-text {
    color: #ffffff; /* White font color */
    font-weight: bold; /* Bold text */
    font-size: 18px; /* Adjust font size */
    opacity: 0;
    animation: fadeInOut 5s linear infinite;
}

@keyframes fadeInOut {
    0%, 100% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
}

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Your custom CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Body content -->
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
                    <th>Image</th>
                    <th>Order Status</th>
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
                        <td>
                            @if($order->image_path)
                                <img src="{{ asset('storage/' . $order->image_path) }}" alt="Order Image" style="width: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="order-status-container order-status">{{ $order->status->name }}</td>
                        <td>
                        <button style="margin-top:10px; width: 115px;" class="btn btn-primary btn-view-order" data-id="{{ $order->id }}">View Order</button>
                        <button style="margin-top:10px; width: 115px;" class="btn btn-primary btn-view-order" data-id="{{ $order->id }}">View Invoice</button>
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

<!-- Order Details Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Order details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewOrderButtons = document.querySelectorAll('.btn-view-order');

    viewOrderButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');
            console.log('Order ID:', orderId); // Log the order ID for debugging

            if (!orderId) {
                console.error('Order ID is null');
                return;
            }

            const url = `/orders/${orderId}`;
            console.log('Fetching URL:', url); // Log the URL being fetched

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    console.log('Response data:', data); // Log the response data for debugging
                    document.querySelector('#orderModal .modal-body').innerHTML = data;
                    const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
                    orderModal.show();
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
</script>
<script>
    // Example jQuery to update status text dynamically (if needed)
$(document).ready(function() {
    setInterval(function() {
        // Replace with your actual logic to update statuses dynamically
        $('.status-text').text('New Status'); // Example update
    }, 5000); // Update every 5 seconds (adjust as needed)
});

</script>
</body>
</html>
