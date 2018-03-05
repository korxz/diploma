<?php 

namespace App\Http\Controllers\Api;

use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}