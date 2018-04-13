<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Auth;

class GalleryController extends Controller
{	
    //Set tablename
    private $table='galleries';

    // list Galleries
    public function index(){
        //Get all Galleries
        $galleries=DB::table($this->table)->get();

    	return view('gallery/index', compact('galleries'));

    }

    //Show Create Form
    public function create(){
            //Check if Logged In
        if(!Auth::check()){

            return \Redirect::route('gallery.index');
        }
            //Render view
    		return view('gallery/create',compact('create'));

    }
    //Store Gallery
    public function store(Request $request){
        //Get request input
        $name= $request->input('name');
        $description= $request->input('description');
        $cover_image= $request->file('cover_image');
        $owner_id=1;

        //Check image upload
        if($cover_image){
            $cover_image_filename=$cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'),$cover_image_filename);

        }
        else{
            $cover_image_filename='noimage.jpg';
        }
        //insert Gallery
        DB::table('galleries')->insert(
            [
                'name'=>$name,
                'description'=>$description,
                'cover_image'=>$cover_image_filename,
                'owner_id'=>$owner_id
            ]
        );

        //Redirect
        return \Redirect::route('gallery.index', compact('index'));

    }

    //show Gallery
    public function show($id){
        //Get Gallery 
        $gallery=DB::table($this->table)->where('id',$id)->first();

        //Get Photo 
        $photos=DB::table('photos')->where('gallery_id',$id)->get();

        //Render view
        return view('gallery/show',compact('gallery','photos'));


    }

}
