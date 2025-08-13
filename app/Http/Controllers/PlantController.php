<?php

namespace App\Http\Controllers;
use App\Models\Product;

class PlantController extends Controller
{
    protected function setCommonSessionData($plants)
    {
        session([
            'cart_count' => 0, // default to 0 since not checking DB
            'business_hours' => config('app.business_hours', 'Mon-Fri: 9AM-5PM'),
            'featured_plant' => !empty($plants)
                ? 'Featured: ' . $plants[0]['name']
                : 'Our Plant Collection'
        ]);
    }

   
       public function indoor()
    {
        $products = Product::where('category', 'indoor')->get();
        return view('plants.indoor', ['products' => $products]);
    }
    

    public function outdoor()
    {
        $plants = [
            ['name' => 'Areca Palm', 'price' => 1800, 'image' => '/images/arecapalm.jpg'],
            ['name' => 'Bougainvillea', 'price' => 1300, 'image' => '/images/bougainvillea.jpg'],
        ];

        $this->setCommonSessionData($plants);

        return view('plants.outdoor', [
            'outdoorPlants' => $plants,
            'pageTitle' => 'Outdoor Plants Collection'
        ]);
    }

    public function herb()
    {
        $plants = [
            ['name' => 'Mint', 'price' => 500, 'image' => '/images/mint.jpg'],
            ['name' => 'Basil', 'price' => 600, 'image' => '/images/basil.jpg'],
        ];

        $this->setCommonSessionData($plants);

        return view('plants.herb', [
            'herbPlants' => $plants,
            'pageTitle' => 'Herb Plants Collection'
        ]);
    }

    public function flowering()
    {
        $plants = [
            ['name' => 'Rose', 'price' => 700, 'image' => '/images/rose.jpg'],
            ['name' => 'Jasmine', 'price' => 750, 'image' => '/images/jasmine.jpg'],
        ];

        $this->setCommonSessionData($plants);

        return view('plants.flowering', [
            'floweringPlants' => $plants,
            'pageTitle' => 'Flowering Plants Collection'
        ]);
    }
}
