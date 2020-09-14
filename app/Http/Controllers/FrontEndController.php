<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('site.layouts.index');
    }

    public function about()
    {
        return view('site.layouts.about');
    }

}
