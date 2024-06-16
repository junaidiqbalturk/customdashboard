<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Order Form</title>
    <!-- Materialize CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f8cdda 0%, #1d2b64 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .btn {
            background-color: #007bff !important;
            color: #fff !important;
            width: 100%;
        }
        .file-field .btn {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Place Your Custom Order</h1>
		@if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
        <form id="orderForm" action="{{ route('custom-order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="name" type="text" class="validate" value="{{ $user->name }}" readonly>
                    <label for="name">Full Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="companyName" type="text" class="validate" value="{{ $user->companyname }}" readonly>
                    <label for="companyName">Company Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="address" name ="address" type="text" class="validate" required>
                    <label for="address">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="city" name ="city" type="text" class="validate" required>
                    <label for="city">City</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name ="country" id="country" required>
                        <option value="" disabled selected>Select Country</option>
                        <option value="USA">USA</option>
                        <option value="Canada">Canada</option>
                        <option value="UK">UK</option>
                        <option value="Australia">Australia</option>
                    </select>
                    <label for="country">Country</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="phonenumber" name ="phonenumber" type="text" class="validate" required>
                    <label for="phonenumber">Phone Number</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name = "digitizing_type" id="digitizing_type" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="vector_art">Vector Art</option>
                        <option value="custom_digitizing">Custom Digitizing</option>
                        <option value="embroidery_digitizing">Embroidery Digitizing</option>
                        <option value="patches">Patches</option>
                        <option value="woven_patches">Woven Patches</option>
                    </select>
                    <label for="digitizing_type">Digitizing Type</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name = "placement" id="placement" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="left_chest">Left Chest</option>
                        <option value="right_chest">Right Chest</option>
                        <option value="bottom">Bottom</option>
                    </select>
                    <label for="placement">Placement</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name = "height" id="height" type="number" class="validate" required>
                    <label for="height">Height (cm)</label>
                </div>
                <div class="input-field col s6">
                    <input name = "width" id="width" type="number" class="validate" required>
                    <label for="width">Width (cm)</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Upload Image</span>
                        <input type="file" name = "image_path" id="image_path" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <button formaction="{{ route('custom-order.store') }}" type="submit" class="btn waves-effect waves-light">Place Your Order Now</button>
            
        </form>
    </div>
    <!-- Materialize JavaScript CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectElems = document.querySelectorAll('select');
            M.FormSelect.init(selectElems);
        });

        const orderForm = document.getElementById('orderForm');
        orderForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('name').value;
            const companyName = document.getElementById('companyName').value;
            const address = document.getElementById('address').value;
            const city = document.getElementById('city').value;
            const country = document.getElementById('country').value;
            const phone = document.getElementById('phonenumber').value;
            const digitizingType = document.getElementById('digitizing_type').value;
            const placement = document.getElementById('placement').value;
            const height = document.getElementById('height').value;
            const width = document.getElementById('width').value;
            const uploadImage = document.getElementById('image_path').files[0];

            if (name && companyName && address && city && country && phone && digitizingType && placement && height && width && uploadImage) {
                alert('Order placed successfully!');
                orderForm.reset();
            } else {
                alert('Please fill out all fields.');
            }
        });
    </script>
</body>
</html>
