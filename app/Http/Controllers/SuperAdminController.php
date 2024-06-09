<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
