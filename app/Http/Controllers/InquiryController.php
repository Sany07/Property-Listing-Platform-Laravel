<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //->latest()
        $inquiries = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('admin.layouts.listing-inquiry.inquiry', compact('inquiries'));
    }


    public function show($id)
    {
        $inquiry = Contact::findOrFail($id);
        return view('admin.layouts.listing-inquiry.single-inquiry', compact('inquiry'));
    }

}
