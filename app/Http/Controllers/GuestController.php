<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nesreca;
use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $last_accident = Nesreca::orderBy("id_nesrece", "desc")
                        ->take(1)
                        ->get();
        $last_x = $last_accident[0]->x;
        $last_y  =$last_accident[0]->y;

        $most_dangerous = Krajevne_lastnosti::selectRaw("odsek, kraj_nesrece, COUNT(kraj_nesrece) as counter")
                                            ->whereNotNull("kraj_nesrece")
                                            ->groupBy("odsek", "kraj_nesrece")
                                            ->orderBy("counter", "desc")
                                            ->take(1)
                                            ->get();

        return view("welcome", compact("last_x", "last_y", "most_dangerous"));
    }
}
