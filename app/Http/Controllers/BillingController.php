<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
public function history()
{
    return view('billing.history'); // create this view
}
}