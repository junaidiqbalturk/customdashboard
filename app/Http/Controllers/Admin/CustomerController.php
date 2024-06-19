<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    //logic to view CUstomers/users 
    public function index()
    {
        $customers = User::where('role', 'user')->get(); // Assuming 'role' identifies customers

        return view('admin.customer.index', compact('customers'));
    }
}
