<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function index()
    {
        return view('admin.layouts.listings.listings');
    }


    public function create()
    {
        return view('admin.layouts.listings.add-listing');

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('admin.layouts.listings.single-listing');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
