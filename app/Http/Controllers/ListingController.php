<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Realtor;


class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::orderBy('id', 'DESC')->get();
        return view('admin.layouts.listings.listings', compact('listings'));
    }


    public function create()
    {
        $realtors = Realtor::all();
        return view('admin.layouts.listings.add-listing', compact('realtors'));

    }


    public function store(Request $request)
    {
        // 'title','description', 'price', 'square_feet','lot_size',
        // 'bedroom','garage', 'main_thumbnail','thumbnail_1',
        // 'thumbnail_2','thumbnail_3','thumbnail_4',
        // 'thumbnail_5','thumbnail_6','realtor_id'
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'square_feet'=>'required',
            'lot_size'=>'required',
            'lot_size'=>'required',
            'garage'=>'required',
            'bedroom'=>'required',
            'is_published'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $listing = new Listing([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'square_feet' => $request->get('square_feet'),
            'lot_size' => $request->get('lot_size'),
            'bedroom' => $request->get('bedroom'),
            'garage' => $request->get('garage'),
            'realtor_id' => $request->get('realtor_id'),
            'is_published' => $request->get('is_published'),
        
        ]);

        //call custom file upload function
        $isSuccess = $this -> massimageUploadHandler($request, $listing);

        if($isSuccess){
            $listing->save();
            return redirect(route('listings.index'))->with('success', 'Listing Added!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');

        }
        
    
    }


    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        return view('admin.layouts.listings.single-listing',compact('listing'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $listing = Listing::findOrFail($id);


        $listing ->title = $request->get('title');
        $listing ->description = $request->get('description');
        $listing ->price= $request->get('price');
        $listing ->square_feet= $request->get('square_feet');
        $listing ->lot_size= $request->get('lot_size');
        $listing ->garage= $request->get('garage');
        $listing ->bedroom= $request->get('bedroom');
        $listing ->realtor_id = $request->get('realtor_id');
        $listing ->is_published = $request->get('is_published');


        //function for image upload
        $this -> massimageUploadHandler($request, $listing);
        $listing->save();
        return redirect(route('listings.index'))->with('success', 'Listing Updated Successfully!');
        
    }


    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
    
        $isSuccess = $listing -> delete();

        if($isSuccess){
            $this -> imageDeleteHandler($listing);
        }
        return redirect(route('listings.index'))->with('success', 'Listing Deleted Successfully!');
        
    }


    //method for mass image upload
    private function massimageUploadHandler($request, $listing)
    {
        
        $images = array(
            $request->image, 
            $request->image_one, 
            $request->image_two, 
            $request->image_three, 
            $request->image_four, 
            $request->image_five, 
            $request->image_six, 
        );
        
        foreach ($images as $key => $image) {
           
            if(file_exists($image)){
                
                //delete old image when perform update functionality
                $isSuccess =  $this->imageUploadHandler($image,$listing,$key);                
                return $isSuccess;
            }            
        }         
        
    }

    //method for image upload

    private function imageUploadHandler($image, $listing, $key){
        $image_new_name = time().'.'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();  
        $isScucess = $image->move(public_path('images/listing'), $image_new_name);
        if($isScucess){
            $image_url = 'images/listing/'.$image_new_name;
            $table_name = 'thumbnail_'.$key;
            if(file_exists($listing->$table_name)){
                unlink($listing->$table_name);                
            }
            $listing->$table_name = $image_url;    

            return TRUE;
        return FALSE;
            
        }        
    }

    //method for delete image from folder
    private function imageDeleteHandler($listing){
        $images = array(
            $listing->thumbnail_0, 
            $listing->thumbnail_1,
            $listing->thumbnail_2,
            $listing->thumbnail_3,
            $listing->thumbnail_4,
            $listing->thumbnail_5,
            $listing->thumbnail_6,
        );
        foreach ($images as $image) {
            if(file_exists($image)){
                unlink($image);                
            }            
        }
    }
}