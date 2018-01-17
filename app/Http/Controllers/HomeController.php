<?php

namespace App\Http\Controllers;

use App\Nesreca;
use App\Krajevne_lastnosti;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_accident = Nesreca::orderBy("datum", "desc")
                            ->first();
                            
        $latest_section = Krajevne_lastnosti::where("id_nesrece", "=", $latest_accident->id_nesrece)
                            ->first();

        return view("home", compact("latest_accident", "latest_section"));
    }
}
