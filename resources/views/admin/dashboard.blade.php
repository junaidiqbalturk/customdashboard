<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.header {
    width: 100%;
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 20px 0;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.header h1 {
    margin: 0;
    font-size: 2rem;
}

.header p {
    margin: 5px 0 0 0;
    font-size: 1.2rem;
}

.main-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 20px;
    width: 100%;
    max-width: 1200px;
}

.card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin: 15px;
    padding: 30px;
    width: 250px;
    text-align: center;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
}

.card h2 {
    margin: 15px 0 0 0;
    font-size: 18px;
    color: #333;
}

.icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}

.icon-container i {
    font-size: 3rem;
    padding: 15px;
    border-radius: 50%;
    color: white;
}

.icon-container .fa-shopping-cart {
    background-color: #ff5722;
}

.icon-container .fa-file-invoice {
    background-color: #4caf50;
}

.icon-container .fa-users {
    background-color: #2196f3;
}

.icon-container .fa-sign-out-alt {
    background-color: #f44336;
}

@media (max-width: 768px) {
    .card {
        width: 150px;
        padding: 20px;
    }

    .card h2 {
        font-size: 16px;
    }

    .icon-container i {
        font-size: 2rem;
        padding: 10px;
    }
}
    </style>
    <script>
        function viewOrders() {
    alert("Navigating to View All Orders page...");
    // Implement navigation logic here
}

function generateInvoices() {
    alert("Navigating to Generate Invoices page...");
    // Implement navigation logic here
}

function viewCustomers() {
    alert("Navigating to View Customers page...");
    // Implement navigation logic here
}

function logout() {
    alert("Logging out...");
    // Implement logout logic here
}
    </script>
</head>
<body>
    <header class="header">
        <h1>Administrator Area</h1>
        <p>Welcome, Admin Name</p>
    </header>
    <main class="main-content">
        <div class="card" onclick="viewOrders()">
            <div class="icon-container">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <h2><a class="nav-link" href="{{ route('admin.orders.index') }}">View All Orders</a></h2> 
        </div>
        <div class="card" onclick="generateInvoices()">
            <div class="icon-container">
                <i class="fas fa-file-invoice"></i>
            </div>
            <h2>Generate Invoices</h2>
        </div>
        <div class="card" onclick="viewCustomers()">
            <div class="icon-container">
                <i class="fas fa-users"></i>
            </div>
            <h2><a class="nav-link" href="{{ route('admin.view-customers') }}">View Customers</a></h2>
        </div>
        <div class="card" onclick="logout()">
            <div class="icon-container">
                <i class="fas fa-sign-out-alt"></i>
            </div>
              <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <button type="submit">Logout</button>
                </form>
        </div>
    </main>
    <script src="scripts.js"></script>
</body>
</html>
