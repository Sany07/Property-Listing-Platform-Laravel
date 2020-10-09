<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Listing
};


class searchController extends Controller
{
    public function search(Request $request)
    {
        $keywords = $request->get('keywords');
        $city = $request->get('city');
        $bedrooms = $request->get('bedrooms');
        $price = $request->get('price');

        $listings = Listing::where('bathroom',$bedrooms)->
                                orWhere('price',$price)->
                                orWhere('city',$city)->
                                when(isset($keywords), function ($query, $keywords) {
                                    $query->where('description','LIKE','%'.$keywords.'%');

                                })->
                                when(isset($keywords), function ($query, $keywords) {
                                    $query->where('description','LIKE','%'.$keywords.'%');
                                })->
                            
                            get();
                        

                    if(count($listings) > 0){

                        return view('site.layouts.search',compact('listings'))->withQuery ( $keywords );
                    
                    }
                    else return view ('site.layouts.search',compact('listings'))->withMessage('No Details found. Try to search again !');

    }





}
