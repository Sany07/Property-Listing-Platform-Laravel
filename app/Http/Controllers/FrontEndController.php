<?php

namespace App\Http\Controllers;
use App\{
    Listing,
    Realtor,
    Contact,
    Som,
};

use Illuminate\Support\Facades\Auth;

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
        $realtors = Realtor::all();
        $som = Som::with('realtor')->first();
        
        return view('site.layouts.about',compact('som','realtors'));
    }


    public function dashboard()
    {   
        if (Auth::check())
        {
            $userid = Auth::id();
            $lists = Contact::with('listing')->where('user_id',$userid)->get();
            return view('site.layouts.dashboard',compact('lists'));
        }
    }




}
