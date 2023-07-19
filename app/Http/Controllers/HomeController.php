<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $asd = 10;
        return view('home.index', compact('asd'));
    }

    public function about()
    {
        return view('home.about');
    }
}
