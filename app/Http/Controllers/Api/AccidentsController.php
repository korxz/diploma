<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Nesreca;
use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;

class AccidentsController
{
    public function index()
    {
        $accidents = Nesreca::limit(100)->get();

        return response()->json(["accidents" => $accidents], 200);
    }

    public function show(Request $request, $id_nesrece)
    {
        if ($request->id_nesrece < 590687)
        {
            return response()->json("Nesrece s takim ID-jem ni v nasi bazi", 200);
        }
        $accident = Nesreca::where("id_nesrece", "=", $id_nesrece)->get();

        return response()->json(["accident" => $accident], 200);   
    }
}