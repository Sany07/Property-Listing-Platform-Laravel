<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.layouts.users.users', compact('users'));
    }


    public function show($id)
    {   
        $user = User::findOrfail($id);
        return view('admin.layouts.users.profile', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',  ],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($id);
        $user -> first_name = $request->get('first_name');
        $user -> last_name = $request->get('last_name');
        $user -> username = $request->get('username');
        $user -> email = $request->get('email');

        $isSuccess = $user->save();
        
        if ($isSuccess) {
            
            $notification = array(
                'message' => 'User Updated!',
                'alert-type' => 'success'
            );
            return redirect(route('users.index'))->with($notification);
        } else {
            $notification = array(
                'message' => 'Somthing Went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $isSuccess = $user->delete();
    }
}
