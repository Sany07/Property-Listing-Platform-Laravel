<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Realtor;


class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::orderBy('id', 'DESC')->where('id', 57)->get();
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
        // 'bedroom','garage', 'main_thumbnail','extra_thumbnail_1',
        // 'extra_thumbnail_2','extra_thumbnail_3','extra_thumbnail_4',
        // 'extra_thumbnail_5','extra_thumbnail_6','realtor_id'
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'square_feet'=>'required',
            'lot_size'=>'required',
            'lot_size'=>'required',
            'garage'=>'required',
            'bedroom'=>'required',
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


    //method for mass image upload
    private function massimageUploadHandler($request, $listing)
    {

        if($request->image){
            //here 3rd peramiter is listing table colum name
            $isSuccess = $this->imageUploadHandler($request->image,$listing, 'main_thumbnail');
            
        }

        if(!$request->image_one == NULL){
            
        $isSuccess = $this->imageUploadHandler($request->image_one,$listing, 'extra_thumbnail_1');
        
        }
        if(!$request->image_two == NULL){
            $isSuccess = $this->imageUploadHandler($request->image_two,$listing, 'extra_thumbnail_2');
        }
        if(!$request->image_three == NULL){
            $isSuccess =$this->imageUploadHandler($request->image_three,$listing, 'extra_thumbnail_3');
                
            }
        if(!$request->image_four == NULL){
            $this->imageUploadHandler($request->image_four,$listing, 'extra_thumbnail_4');
                
            }
        if(!$request->image_five == NULL){
                $this->imageUploadHandler($request->image_five,$listing, 'extra_thumbnail_5');
                
            }
        if(!$request->image_six == NULL){
                $this->imageUploadHandler($request->image_six,$listing, 'extra_thumbnail_6');
                
            }
        
    return $isSuccess;


    }

    //method for image upload

    private function imageUploadHandler($image, $listing, $table_name){
        $image_new_name = $image->getClientOriginalName().'.'.time().'.'.$image->getClientOriginalExtension();  
        $isScucess = $image->move(public_path('listing'), $image_new_name);
        if($isScucess){
            $image_url = 'listing/'.$image_new_name;
            $listing->$table_name = $image_url;            
            return TRUE;
        return FALSE;
            
        }        

    }
}
