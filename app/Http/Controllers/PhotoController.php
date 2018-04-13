<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use DB;
use Auth;

class PhotoController extends Controller
{
    //
    private $table='photos';
    // list Galleries
    

    //Show Create Form
    public function create($gallery_id){
        //Checked If Logged In
        if(!Auth::check()){

                return \Redirect::route('gallery.index');

        }        

            return view('photo/create', compact('gallery_id'));
 
    }
    //Store Photo
    public function store(Request $request){
        //Get request input
        $gallery_id=$request->input('gallery_id');
        $title= $request->input('title');
        $description= $request->input('description');
        $location=$request->input('location');
        $image= $request->file('image');
        $owner_id=1;

        //Check image upload
        if($image){
            $image_filename =$image->getClientOriginalName();
            $image->move(public_path('images'),$image_filename);

        }
        else{
            $image_filename='noimage.jpg';
        }
        //insert Gallery
        DB::table($this->table)->insert(
            [
                'title'=>$title,
                'description'=>$description,
                'location'=>$location,
                'gallery_id'=>$gallery_id,
                'image'=>$image_filename,
                'owner_id'=>$owner_id
            ]
        );

        //Redirect
        return \Redirect::route('gallery.show',array('id'=>$gallery_id));

    }

    //show details
    public function details($id){
        //Get Photo
        $photos=DB::table($this->table)->where('id',$id)->first();
        //Render view
        return view('photo/details',compact('details'));

    	
    }

}
