<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    
    public function one()
    {
        // $collection = collect(['Andrew', 'Andre', 'Jeffrey']);
        $collection = collect([
            [
                'name' => 'Andrew',
                'plants' => 50
            ],
            [
                'name' => 'Andre',
                'plants' => 20
            ],
            [
                'name' => 'Jeffrey',
                'plants' => 90
            ]
        ]);

        $filtered = $collection->filter(function($item) {
            return $item['plants'] > 30;
        });

        return $filtered->values()->all();
    }

    public function two()
    {
        $collection = collect([
            [
                'state' => 'Florida',
                'capital' => 'Tallahassee',
                'topCities' => [
                    'one' => 'Orlando',
                    'two' => 'Miami'
                ]
            ],
            [
                'state' => 'North Carolina',
                'capital' => 'Raleigh',
                'topCities' => [
                    'one' => 'Charlotte',
                    'two' => 'Asheville'
                ]
            ],
        ]);

        $plucked = $collection->pluck('topCities.one');

        return $plucked->all();
    }

    public function three()
    {
        // $collection = collect(['Andrew', 'Andre', 'Jeffery']);
        $collection = collect([
            [
                'name' => 'Andrew',
                'plants' => 50
            ],
            [
                'name' => 'Andre',
                'plants' => 20
            ],
            [
                'name' => 'Jeffrey',
                'plants' => 90
            ]
        ]);

        $contains = $collection->contains(function($item) {
            return $item['plants'] > 50;
        });

        return $contains ? 'Array does contain' : 'Array does not contain';
    }

    public function four()
    {
        $collection = collect(['Andrew', 'Andre', 'Jeffrey', 'Ashley', 'Jess']);

        [$aboveFive, $underFive] = $collection->partition(function($item) {
            return strlen($item) > 5;
        });

        return $underFive->values()->all();
    }

    public function five()
    {
        $collection = collect([
            [
                'title' => 'Testing One',
                'author' => 'Test Author One'        
            ],
            [
                'title' => 'Testing Two',
                'author' => 'Test Author Two'        
            ],
            [
                'title' => 'Testing Three',
                'author' => 'Test Author Three'        
            ],
            [
                'title' => 'Testing Four',
                'author' => 'Test Author Four'        
            ]
        ]);

        $chunks = $collection->chunk(2);

        return $chunks->first()->all();
    }

}
