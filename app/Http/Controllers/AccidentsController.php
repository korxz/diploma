<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nesreca;
use Illuminate\Support\Facades\DB;

class AccidentsController extends Controller
{
    public function show()
    {
        $accidents = Nesreca::where("x", "<>", 0)
                            ->where("y", "<>", 0)
                            ->limit(50000)
                            ->get();
        $mediana_X = 0;
        $mediana_Y = 0;
        $max_X = 0;
        $max_Y = 0;
        $min_X = 1000;
        $min_Y = 1000;


        foreach($accidents as $accident) {
            if ($accident->x > $max_X) 
            {
                $max_X = $accident->x;
            }
            if ($accident->x < $min_X)
            {
                $min_X = $accident->x;
            }

            if ($accident->y > $max_Y) 
            {
                $max_Y = $accident->y;
            }

            if ($accident->y < $min_Y)
            {
                $min_Y = $accident->y;
            }
            $mediana_X += $accident->x;
            $mediana_Y += $accident->y;
        }

        $coordinate_borders = array(
            "min_X" => $min_X,
            "min_Y" => $min_Y,
            "max_X" => $max_X,
            "max_Y" => $max_Y
        );

        $mediana_X = $mediana_X / 50000;
        $mediana_Y = $mediana_Y / 50000;

        return view("accidents.index", compact("accidents", "mediana_X", "mediana_Y", "coordinate_borders"));
    }
}
