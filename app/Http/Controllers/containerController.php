<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class containerController extends Controller
{
    public function getContainerSize(Request $request)
    {
        // Create array data from request
        $input = array_map( function($item){
            if(!$item) $item = 0;
            return trim($item);
        }, explode(',', $request->phpdata));
        $y = max($input); // Get max of array for genarate table view
        $x = count($input); // Get min of array for genarate table view

        // Create Wall (Black)
        // --- Start Comment --- //
        // After this code run finish, you will get array data to look like a table
        // 0: [7]
        // 1: [3, 7, 8, 12]
        // 2: [1, 3, 4, 6, 7, 8, 10, 12]
        // Now you have a wall data on this array
        // --- End Comment --- //
        $tr = $y-1;
        $row = array();
        $wall = array();
        for ($i = 0; $i <= ($y-1); $i++ ) {
            $row = [];
            foreach ($input as $index => $item){
                if($item > $i) {
                    array_push($row, $index);
                }
            }
            $wall[$tr] = $row;
            $tr--;
        }
        $wall = array_values(array_sort($wall));

        // Create Water (Blue)
        // --- Comment --- //
        // Check once row (index in array) for put water
        // Example on index 1 ( data in array is [3, 7, 8, 12] )
        // Loop start on first number of array +1 to end number of array -1 (3+1 and 12-1)
        // and check number of loop match in wall data
        // if matched is mean "this's the wall", if don't is mean "pull water" ( You can count total of water in this step )
        // --- Comment --- //
        $waterCount = 0;
        $row = array();
        $water = array();
        foreach ($wall as $index => $item){
            if(COUNT($item) > 1) {
                $min = min($item);
                $max = max($item);
                for ($i = $min+1; $i <= $max-1; $i++ ) {
                    if (!in_array($i, $item)) {
                        array_push($row, $i);
                        $waterCount++;
                    }
                }
                $water[$index] = $row;
            }
        };
        $phpResultTable = $waterCount;

        return view('welcome', compact('input', 'x', 'wall', 'water', 'phpResultTable'));
    }
}
