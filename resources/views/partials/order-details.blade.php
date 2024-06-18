<!-- resources/views/partials/order_details.blade.php -->

<div>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Name:</strong> {{ $order->user->name }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>City:</strong> {{ $order->city }}</p>
    <p><strong>Country:</strong> {{ $order->country }}</p>
    <p><strong>Phone Number:</strong> {{ $order->phonenumber }}</p>
    <p><strong>Digitizing Type:</strong> {{ $order->digitizing_type }}</p>
    <p><strong>Placement:</strong> {{ $order->placement }}</p>
    <p><strong>Height:</strong> {{ $order->height }}</p>
    <p><strong>Width:</strong> {{ $order->width }}</p>
    <p><strong>Order Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Image:</strong></p>
    @if($order->image_path)
        <img src="{{ asset('storage/' . $order->image_path) }}" alt="Order Image" style="max-width: 100%; height: auto;">
    @endif
</div>
