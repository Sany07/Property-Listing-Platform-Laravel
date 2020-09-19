<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Listing;

class FrontEndController extends Controller
{
    public function index()
    {


        $latest_listings = Listing::orderBy('id', 'DESC')->where('is_published','1')->limit('3')->get();
        return view('site.layouts.index', compact('latest_listings'));
    }

    public function listings()
    {


        $listings = Listing::orderBy('id', 'DESC')->where('is_published','1')->get();
        return view('site.layouts.listings', compact('listings'));
    }
    public function listing($id)
    {

        $listing = Listing::with('realtor')->where('is_published','1')->findOrFail($id);
        
        return view('site.layouts.listing', compact('listing'));
    }



    public function about()
    {
        return view('site.layouts.about');
    }

}
