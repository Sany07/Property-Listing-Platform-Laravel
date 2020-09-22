<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact_number'=>'required',
            'message'=>'required',
            'listing_id' => 'required',
            'user_id' => 'required',

        ]);

        $contact = new Contact([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'contact_number' => $request->get('contact_number'),
            'description' => $request->get('message'),
            'listing_id' => $request->get('listing_id'),
            'user_id' => $request->get('user_id'),

        ]);

        $isSuccess =$contact->save();
        if ($isSuccess) {
            $notification = array(
                'message' => 'Post created successfully!',
                'alert-type' => 'success'
            );
            
            return redirect('/')->with($notification);
        } else {
            $notification = array(
                'message' => 'Somthing Went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
