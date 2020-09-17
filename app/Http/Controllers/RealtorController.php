<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realtor;
use App\Listing;
use Session;

class RealtorController extends Controller
{

    public function index()
    {
        $realtors = Realtor::with("Listing")->get();
        return view('admin.layouts.realtors.realtors', compact('realtors'));
    }

    public function create()
    {
        return view('admin.layouts.realtors.add_realtor');
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
    
        //call custom file upload function
        $isSuccess = $this -> imageUploadHandler($request->image, $request->name, $realtor);
        
        if($isSuccess){
            return redirect(route('realtors.index'))->with('success', 'Realtor Added!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
     
    }


    public function show($id)
    {
        $realtor = Realtor::findOrFail($id);
        return view('admin.layouts.realtors.single_realtor', compact('realtor'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'contact_number'=>'required'
        ]);

        $realtor = Realtor::findOrFail($id);
        $realtor -> name = $request->get('name');
        $realtor -> address = $request->get('address');
        $realtor -> email = $request->get('email');
        $realtor -> contact_number = $request->get('contact_number');
        
        //storing redirect route & success message
        $successMessage = redirect(route('realtors.index'))->with('success', 'Realtor Updated!');

        if(!$request->image){
            $realtor->save();
            return $successMessage;
        }
        elseif(file_exists($realtor->image)){  //check the file exist or not

            unlink($realtor->image);
        }
        //call custom file upload function
        $isSuccess = $this -> imageUploadHandler($request->image, $request->name, $realtor);
        
        if($isSuccess){
            return $successMessage;
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id)
    {
        $realtor = Realtor::findOrFail($id);
        
        if(file_exists($realtor->image)){
            unlink($realtor->image);                
        }
        $realtor -> delete();
        return redirect(route('realtors.index'))->with('success', 'Realtor Deleted Successfully!');
        
    }

    private function imageUploadHandler($image,$name, $realtor)
    {

        $image_new_name = $name.'.'.time().'.'.$image->getClientOriginalExtension();  
        $isScucess = $image->move(public_path('images/realtor'), $image_new_name);
    
        if($isScucess){
            $image_url = 'images/realtor/'.$image_new_name;
            $realtor->image = $image_url;
            $realtor->save();
            
            return TRUE;
        return FALSE;
            
        }
    }
}
