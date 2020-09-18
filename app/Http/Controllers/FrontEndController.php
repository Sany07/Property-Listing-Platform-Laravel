<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listing;

class FrontEndController extends Controller
{
    public function index()
    {


        $latest_listings = Listing::all();
        return view('site.layouts.index', compact('latest_listings'));
    }

    public function about()
    {
        return view('site.layouts.about');
    }

}
