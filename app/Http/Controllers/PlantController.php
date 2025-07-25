<?php

namespace App\Http\Controllers;

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
        $plants = [
            ['name' => 'Snake Plant', 'price' => 1200, 'image' => '/images/snakeplant.jpg'],
            ['name' => 'Peace Lily', 'price' => 1500, 'image' => '/images/peacelily.jpg'],
        ];

        $this->setCommonSessionData($plants);

        return view('plants.indoor', [
            'indoorPlants' => $plants,
            'pageTitle' => 'Indoor Plants Collection'
        ]);
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
