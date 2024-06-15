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
        $request->validate([
            'digitizing_type' => 'required|string',
            'length' => 'required|integer',
            'width' => 'required|integer',
            'placement' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Order::create([
            'user_id' => Auth::id(),
            'digitizing_type' => $request->digitizing_type,
            'length' => $request->length,
            'width' => $request->width,
            'placement' => $request->placement,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('custom-order.create')->with('success', 'Order placed successfully!');
    }
}
