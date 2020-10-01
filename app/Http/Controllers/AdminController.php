<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Listing,
    User};
class AdminController extends Controller
{
    public function index()
    {

        $tl = Listing::count();
        $users = User::all();
        $total_users = $users->where('role', '0')->count();
        $total_realtors = $users->where('role', '2')->count();

     
        return view('admin.layouts.dashboard',['total_listing' => $tl] );
    }
}
