<?php

namespace App\Http\Controllers;

use App\Krajevne_lastnosti;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function show() {

        $sections = Krajevne_lastnosti::selectRaw("odsek, kraj_nesrece, COUNT(kraj_nesrece) as counter")
                                    ->whereNotNull("kraj_nesrece")
                                    ->groupBy("odsek", "kraj_nesrece")
                                    ->orderBy("counter", "desc")
                                    ->get();

        return view("sections.index", compact("sections"));
    }
}
