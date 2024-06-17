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

    public function store(Request $request)
    {
        \Log::info('Form Submission Started');
        \Log::info('Request Data:', $request->all());
    
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string',
            'phonenumber' => 'required|string',
            'digitizing_type' => 'required|string',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'placement' => 'required|string',
            // 'image' => 'required|image|max:2048'
        ]);
    
        \Log::info('Validated Data:', $validatedData);
    
        // Simulate image path
        $imagePath = 'uploads/test.jpg';
    
        $order = new Order();
        $order->user_id = Auth::id();
        $order->address = $validatedData['address'];
        $order->city = $validatedData['city'];
        $order->country = $validatedData['country'];
        $order->phonenumber = $validatedData['phonenumber'];
        $order->digitizing_type = $validatedData['digitizing_type'];
        $order->height = $validatedData['height'];
        $order->width = $validatedData['width'];
        $order->placement = $validatedData['placement'];
        $order->image_path = $imagePath;
    
        \Log::info('Order Data Before Save:', $order->toArray());
    
        try {
            $order->save();
            \Log::info('Order saved successfully.');
        } catch (\Exception $e) {
            \Log::error('Order Save Failed:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Order could not be saved.']);
        }
    
        return redirect()->route('custom-order.create')->with('success', 'Order placed successfully');
    }
    

}
