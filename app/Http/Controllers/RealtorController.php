<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realtor;
use Session;

class RealtorController extends Controller
{

    public function index()
    {
        $realtors = Realtor::all();
        return view('admin.layouts.realtors', compact('realtors'));
    }

    public function create()
    {
        return view('admin.layouts.add_realtor');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'contact_number'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $realtor = new Realtor([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'contact_number' => $request->get('contact_number'),
        
        ]);
    
            $image_new_name = $request->name.'.'.time().'.'.$request->image->getClientOriginalExtension();  
            $isScucess = $request->image->move(public_path('realtor'), $image_new_name);
            
            if($isScucess){
                $image_url = 'realtor/'.$image_new_name;
                $realtor->image = $image_url;
                $realtor->save();
            }
 
        // $realtor->save();
        // $realtor->save();

        return redirect(route('realtors.index'))->with('success', 'Realtor Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realtor = Realtor::find($id);
        return view('admin.layouts.realtor', compact('realtor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realtor = Realtor::find($id);
        return view('admin.layouts.realtor', compact('realtor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'contact_number'=>'required'
        ]);

        $realtor = Realtor::find($id);

   
        $realtor -> name = $request->get('name');
        $realtor -> address = $request->get('address');
        $realtor -> email = $request->get('email');
        $realtor -> contact_number = $request->get('contact_number');

        $realtor->save();

        return redirect(route('realtors.index'))->with('success', 'Realtor Updated!');

    }

    public function destroy($id)
    {
        $realtor = Realtor::find($id);
        $realtor -> delete();
        Session::flash('success', 'Realtor Deleted Successfully!');
        return redirect(route('realtors.index'));

    }
}
