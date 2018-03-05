<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nesreca;
use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;

class AccidentsController extends Controller
{
    public function show()
    {
        $accidents = Nesreca::where("x", "<>", 0)
                            ->where("y", "<>", 0)
                            ->limit(50000)
                            ->get();

        $max_X = 0;
        $max_Y = 0;
        $min_X = 1000;
        $min_Y = 1000;


        foreach($accidents as $accident) {
            if ($accident->x > $max_X) 
            {
                $max_X = $accident->x;
            }
            elseif ($accident->x < $min_X)
            {
                $min_X = $accident->x;
            }

            elseif ($accident->y > $max_Y) 
            {
                $max_Y = $accident->y;
            }

            elseif ($accident->y < $min_Y)
            {
                $min_Y = $accident->y;
            }
        }

        $coordinate_borders = array(
            "min_X" => $min_X,
            "min_Y" => $min_Y,
            "max_X" => $max_X,
            "max_Y" => $max_Y
        );


        return view("accidents.index", compact("accidents", "coordinate_borders", "borders"));
    }

}
