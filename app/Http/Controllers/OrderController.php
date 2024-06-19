<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Status;
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
            'image' => 'required|image|max:2048'
        ]);
    
        \Log::info('Validated Data:', $validatedData);
    
          // Handle the image upload
            if ($request->hasFile('image')) 
             {
                  $imagePath = $request->file('image')->store('uploads', 'public');
            } else 
                {
                    $imagePath = null;
                }
        // Simulate image path
        //$imagePath = 'uploads/test.jpg';
    
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
        $order->status_id = 1;
    
        \Log::info('Order Data Before Save:', $order->toArray());
    
        try {
            $order->save();
            \Log::info('Order saved successfully.');
        } catch (\Exception $e) {
            \Log::error('Order Save Failed:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => 'Order could not be saved.']);
        }
    
        return redirect()->route('home')->with('success', 'Order placed successfully');
    }

    //order History Function 
    public function orderHistory()
    {
        //Get AUthenticated User 
        $user = Auth::user();

        //Fetch the orders for the authenticated user
        $orders = Order::where('user_id',$user->id)->orderBy('created_at','asc')->get();

        //pass the orders to the view 
        return view('order-history', compact('orders'));
    }

    //Function to show SIngle Order in detail 

    public function show($id)
    {
        // Retrieve the order by ID
        $order = Order::find($id);

         // Check if the order exists
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
         // Return the partial view with the order data
         return view('partials.order-details', compact('order'));
    }
    //Fetching Order details for Administrator
    public function index()
    {
        $orders = Order::with(['user', 'status'])->get();
        $statuses = Status::all();
        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    //Update logic for ORder status for Admin
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_id = $request->status_id;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}
