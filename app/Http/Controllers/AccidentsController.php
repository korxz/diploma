<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccidentsController extends Controller
{
    public function show() {

        $accidents = DB::table("nesreca")
                        ->where("x", "<>", 0)
                        ->where("y", "<>", 0)
                        ->limit(100)
                        ->get();
        $mediana_X = 0;
        $mediana_Y = 0;
        foreach($accidents as $accident) {
            $mediana_X += $accident->x;
            $mediana_Y += $accident->y;
        }
        $mediana_X = $mediana_X / 100;
        $mediana_Y = $mediana_Y / 100;

        return view("accidents.index", compact("accidents", "mediana_X", "mediana_Y"));
    }
}
