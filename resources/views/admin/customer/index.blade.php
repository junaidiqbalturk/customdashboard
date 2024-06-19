<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard - Active Customers</title>
    <style>
        /* Reset default browser styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
            overflow-x: hidden; /* Prevent horizontal scrollbar */
        }

        /* Navbar styles */
        .navbar {
            background-color: #343a40;
            color: #ffffff;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: #ffffff;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin-left: 1rem;
            list-style-type: none;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #17a2b8;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Main content styles */
        .main-content {
            margin-top: 2rem;
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table th,
        .table td {
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">Administrator Dashboard</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Orders</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn">Add New Customer</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <h1>Active & Registered Customers</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Company Name</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->caddress }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>{{ $customer->phonenumber }}</td>
                        <td>{{ $customer->companyname }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
