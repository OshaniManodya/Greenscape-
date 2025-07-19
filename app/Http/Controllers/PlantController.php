<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantController extends Controller{
public function indoor()
{
    $indoorPlants = Plant::where('category', 'indoor')->get();
    return view('plants.indoor', compact('indoorPlants'));
}

public function outdoor()
{
    $outdoorPlants = Plant::where('category', 'outdoor')->get();
    return view('plants.outdoor', compact('outdoorPlants'));
}

public function herb()
{
    $outdoorPlants = Plant::where('category', 'herb')->get();
    return view('plants.herb', compact('herbPlants'));
}

public function flowering()
{
    $outdoorPlants = Plant::where('category', 'flowering')->get();
    return view('plants.flowering', compact('floweringPlants'));
}
}