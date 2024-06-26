<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
     <!-- Include Materialize Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
        /* Embedding CSS here for simplicity */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 40px;
            background-color: #007bff;
            color: white;
          /*  margin-top: -20px;*/
        }
        @media only screen and (min-width: 993px) {
  .container {
    width: 95%;
    text-align: center;
  }
}
        header h1 {
            margin: 0;
        }

        .header-right {
            position: relative;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-menu .dropdown-item {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #f5f5f5;
        }

        .cards-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 40px;
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 768px) {
            .cards-container {
                flex-direction: column;
                align-items: center;
            }
        }
        /* Custom styles for toast notifications */
        .custom-toast {
            background-color: #4caf50 !important;/* Success color */
            color: white;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px;
        }
        /* notification css */
        .animated {
  animation-duration: 1s;
  animation-iteration-count: infinite;
}

@keyframes tada {
  0% {
    transform: scale3d(1, 1, 1);
  }

  10%, 20% {
    transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
  }

  30%, 50%, 70%, 90% {
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
  }

  40%, 60%, 80% {
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
  }

  100% {
    transform: scale3d(1, 1, 1);
  }
}

.tada {
  animation-name: tada;
}

.notice {
  background-color: #EFEFEF;
  border: 3px solid #444;
  padding: 1rem;
  margin: 2rem 0;
}

.notice::before {
  content: "Notice";
  background: yellow;
  width: 24rem;
  border-right: 3px solid #444;
  border-bottom: 3px solid #444;
  display: block;
  text-align: center;
  position: relative;
  left: -1rem;
  top: -1rem;
  padding: 2px 10px;
  font-weight: bold;
}
        
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header>
            <div class="header-left">
                <h1>Dashboard</h1>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <button class="dropdown-toggle" id="dropdownMenuButton">
                        Hello, {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <main>
       <!-- Notifications -->
       @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="notifications">
                @foreach(auth()->user()->notifications as $notification)
                    <div class="notification notice">
                        <i class="fas fa-info-circle animated tada"></i>
                        <div class="notification-content">
                        <p>Invoice #{{ $notification->data['invoice_id'] }} for Order #{{ $notification->data['order_id'] }} has been generated. Amount: ${{ $notification->data['amount'] }}</p>
                            <span>{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="cards-container">
                <div class="card">
                    <div class="card-content">
                        <i class="fas fa-shopping-cart card-icon"></i>
                        <h2><a href="{{ route('custom-order.create') }}">Place your Order</a></h2>
                        <p>Order custom products quickly and easily.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <i class="fas fa-history card-icon"></i>
                        <h2><a href="{{ route('order.history') }}">Order History</a></h2>
                        <p>View your past orders and track current ones.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <i class="fas fa-user card-icon"></i>
                        <h2><a href="{{ route('profile') }}">Profile</a></h2>
                        <p>Update your personal information and settings.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <i class="fas fa-file-invoice card-icon"></i>
                        <h2>View your Invoices</h2>
                        <p>Access and manage your invoices.</p>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownMenuButton');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            window.addEventListener('click', function(e) {
                if (!dropdownButton.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
    <!-- Include Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                M.toast({
                html: '<i class="material-icons left">check_circle</i>{{ session('success') }}',
                displayLength: 4000,
                classes: 'custom-toast',
                displayLength: 4000,
                inDuration: 300,
                outDuration: 375,
                classes:    'rounded',
                completeCallback: function() { console.log('Toast dismissed.'); },
                activationPercent: 0.8
            });
            });
        </script>
    @endif
</body>
</html>
