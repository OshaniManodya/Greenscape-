<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function indoor()
    {
        return view('plants.indoor'); // Loads resources/views/plants/indoor.blade.php
    }

    public function outdoor()
    {
        return view('plants.outdoor');
    }

    public function herb()
    {
        return view('plants.herb');
    }

    public function flowering()
    {
        return view('plants.flowering');
    }
}