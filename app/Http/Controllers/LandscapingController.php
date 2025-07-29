<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandscapingController extends Controller
{
    // Show the cart page
    public function index()
    {
        // Later you can load cart items from DB here
        return view('landscaping');  
    }
}
