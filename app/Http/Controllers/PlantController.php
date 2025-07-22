<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Cart;

class PlantController extends Controller
{
    /**
     * Shared method to set session data
     */
    protected function setCommonSessionData($plants)
    {
        session([
            'cart_count' => auth()->check() 
                ? Cart::where('user_id', auth()->id())->count() 
                : 0,
            'business_hours' => config('app.business_hours', 'Mon-Fri: 9AM-5PM'),
            'featured_plant' => $plants->isNotEmpty()
                ? 'Featured: ' . $plants->first()->name
                : 'Our ' . ucfirst($plants->first()->category ?? 'Plant') . ' Collection'
        ]);
    }

    public function indoor()
{
    $plants = Plant::where('category', 'indoor')->get();
    $this->setCommonSessionData($plants);
    
    return view('plants.indoor', [
        'indoorPlants' => $plants,
        'pageTitle' => 'Indoor Plants Collection'
    ]);
}


    public function outdoor()
    {
        $plants = Plant::where('category', 'outdoor')->get();
        $this->setCommonSessionData($plants);
        
        return view('plants.outdoor', [
            'outdoorPlants' => $plants,
            'pageTitle' => 'Outdoor Plants Collection'
        ]);
    }

    public function herb()
    {
        $plants = Plant::where('category', 'herb')->get();
        $this->setCommonSessionData($plants);
        
        return view('plants.herb', [
            'herbPlants' => $plants,  // Fixed variable name
            'pageTitle' => 'Herb Plants Collection'
        ]);
    }

    public function flowering()
    {
        $plants = Plant::where('category', 'flowering')->get();
        $this->setCommonSessionData($plants);
        
        return view('plants.flowering', [
            'floweringPlants' => $plants,
            'pageTitle' => 'Flowering Plants Collection'
        ]);
    }
}