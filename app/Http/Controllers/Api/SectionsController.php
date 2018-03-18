<?php 

namespace App\Http\Controllers\Api;

use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Nesreca;

class SectionsController
{
    public function index()
    {
        $sections = Krajevne_lastnosti::selectRaw("odsek, kraj_nesrece, COUNT(kraj_nesrece) as counter")
                                ->whereNotNull("kraj_nesrece")
                                ->groupBy("odsek", "kraj_nesrece")
                                ->orderBy("counter", "desc")
                                ->get();

        return response()->json(["sections" => $sections], 200);
    }

    public function show(Request $request, $id_nesrece)
    {
        if ($id_nesrece < 590687)
        {
            return response()->json("Nesrece s takim ID-jem ni v bazi", 201);
        }
        $section = Krajevne_lastnosti::where('id_nesrece', '=', $id_nesrece)->get();
        
        return response()->json(["section" => $section], 200);
    }

    public function near(Request $request, $x, $y)
    {
        $sections = Krajevne_lastnosti::limit(30000)->get();
        $unorderd_distances = array();
        foreach($sections as $section)
        {
            $distance = $section->near($x, $y);
            array_push($unorderd_distances, $distance);
        }
        sort($unorderd_distances, SORT_NUMERIC);
        $sliced_array = array_slice($unorderd_distances, 0, 500);

        return response()->json(            	
            ["distance" => $sliced_array],
             200
        );
    }
}