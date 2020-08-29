<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Sales;
use App\Models\Purchase;

class AuthController extends Controller
{

    public function index()
    {
        return view('users/login');
    }
    public function login()
    {
        return view('dashboard');
    }
}
