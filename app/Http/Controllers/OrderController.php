<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
class OrderController extends Controller
{
    //
    public function create()
    {
        $user = Auth::user();
        return view('custom-order', compact('user'));

    }

   /* public function store(Request $request)
    {
        dd($request->all());
        // Validate request
    $validatedData = $request->validate([
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'country'=>'required|string',
        'digitizing_type' => 'required|string',
        'length' => 'required|numeric',
        'width' => 'required|numeric',
        'placement' => 'required|string',
        'image' => 'required|image|max:2048'
    ]);
    dd($validatedData);
        // Handle file upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('uploads', 'public');
        }
      
        // Create new order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address = $validatedData['address'];
        $order->city = $validatedData['city'];
        $order->digitizing_type = $validatedData['digitizing_type'];
        $order->length = $validatedData['length'];
        $order->width = $validatedData['width'];
        $order->placement = $validatedData['placement'];
        $order->image_path = $imagePath ?? null;

        \DB::listen(function($query) {
            \Log::info($query->sql);
            \Log::info($query->bindings);
        });

        $order->save();
        return redirect()->route('custom-order.create')->with('success', 'Order placed successfully');
    }*/


    public function store(Request $request)
{
    // Log the incoming request
    \Log::info('Incoming request data:', $request->all());

    // Validate request
    $validatedData = $request->validate([
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'digitizing_type' => 'required|string',
        'length' => 'required|numeric',
        'width' => 'required|numeric',
        'placement' => 'required|string',
        'image' => 'required|image|max:2048'
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    }

    // Create new order
    $order = new Order();
    $order->user_id = Auth::id();
   // $order->full_name = Auth::user()->name;
    //$order->company_name = Auth::user()->company_name;
    $order->address = $validatedData['address'];
    $order->city = $validatedData['city'];
    $order->country = $validatedData['country'];
    $order->digitizing_type = $validatedData['digitizing_type'];
    $order->length = $validatedData['length'];
    $order->width = $validatedData['width'];
    $order->placement = $validatedData['placement'];
    $order->image_path = $imagePath ?? null;
    $order->save();

    return redirect()->route('custom-order.create')->with('success', 'Order placed successfully');
}
}
