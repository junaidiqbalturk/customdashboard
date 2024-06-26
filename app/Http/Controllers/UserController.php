<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('home'); // Assuming you have this view already
    }

    //User Profile COntroller 
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
