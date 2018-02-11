<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use DB;
use App\Search;
use File;
use Session;
use Log;
use Intervention\Image\ImageManager;

class MediaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_media');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //multi language variables
        $lang = Session::get('lang');
        $title = 'title_'.$lang;
        $date = 'date_'.$lang;
        $short_desc = 'short_desc_'.$lang;
        $description = 'description_'.$lang;

        // validation
          $this->validate($request,[
           $title=>'required|max:255|unique:media',
           $date=>'required',
           $short_desc=>'required',
           $description=>'required',
           'image' =>'required|mimes:jpg,jpeg,bmp,png',
          ]);

        //data storage
        $media = new Media();
        $media->$title = $request->$title;
        $media->$date = $request->$date;
        $media->$short_desc = $request->$short_desc;
        $media->$description = $request->$description;
        $media->type = $request->type;
        $media->tags = $request->input('tags_array');
        $media->type = $request->input('type');
        
        //save the record to retreive id later
        $media->save();

        //retreive id from previously stored record
        $id = $media->id;

        //retreive media object again
        $media = Media::findOrFail($id);

         //make image path
        $path = 'uploads/'.$request->type.'/';

        //variable for thumb image if present or otherwise
        $image_thumb_name = '';

          //image uploading
        if($request->image!='') {
          //image names i.e. (image and image_thumb)
          $image_name = $id.'.'.$request->image->getClientOriginalExtension();
          $image_thumb_name = $id.'_t.'.$request->image->getClientOriginalExtension();

          //resize image for thumbnail
          $driver = new imageManager(array('driver'=>'gd'));
          $image_thumb = $driver->make($request->image)->resize(200,150);

          //store image and thumbnail in storage
          $request->image->move($path,$image_name);
          $image_thumb->save($path.$image_thumb_name);

          //db image storage
          $media->image = $image_name;
          $media->image_thumb = $image_thumb_name;

        }
         else {
          //if image not present for search table
          $image_thumb_name = 'default.jpg';

          //if no image received store the default
          $media->image = 'default.jpg';
          $media->image_thumb = 'thumb.jpg';
        }

        if($media->save()) {
          //search stuff
          $search = new Search();
          $search->$title = $request->$title;
          $search->$date = $request->$date;
          $search->$short_desc = $request->$short_desc;
          $search->$description = $request->$description;
          $search->table_name = 'media';
          $search->type = $request->type;
          $search->table_id = $id;
          $search->image_thumb = $path.$image_thumb_name;
          $search->save();
        }
        Session::put('lang','');
        Session::put('type','');
        Log::info($id." Media record created by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route("admin_".$request->type);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('admin.edit_media')->with('media',$media);
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
       //multi language variables
        $lang = Session::get('lang');
        $title = 'title_'.$lang;
        $date = 'date_'.$lang;
        $short_desc = 'short_desc_'.$lang;
        $description = 'description_'.$lang;
        // validation
        $this->validate($request,[
          $title=>'required',
          $short_desc=>'required',
          $description=>'required',
        ]);

      // media data storage
       $media = Media::findOrFail($id);
       $search_obj = Search::where('table_name','=','media')->where('table_id','=',$id)->first();
       $media->$title = $request->$title;
       if($request->$date!='') {
         $media->$date = $request->$date;
       }
       $media->$short_desc = $request->$short_desc;
       $media->$description = $request->$description;
        
       if($request->image!=null) {
          // validation
          $this->validate($request,[
            'image'=>'mimes:jpg,png,jpeg,bmp',
          ]);

         //remove existing images
         File::delete($search_obj->image_thumb);
         File::delete(str_replace('_t','',$search_obj->image_thumb));

         //set new images name
         $image_name = $id.'.'.$request->image->getClientOriginalExtension();
         $image_thumb_name = $id.'_t.'.$request->image->getClientOriginalExtension();

         //resize image for thumbnail
         $driver = new imageManager(array('driver'=>'gd'));
         $image_thumb = $driver->make($request->image)->resize(200,150);

         //construct image path
         $image_path = 'uploads/'.$request->type.'/';

         //move i.e.(to storage) image
         $image_thumb->save($image_path.$image_thumb_name);
         $request->image->move($image_path,$image_name);
         //store in db
         $media->image = $image_name;
         $media->image_thumb = $image_thumb_name;
       }

       if($media->save()) {
         $search_obj->$title = $request->$title;
         $search_obj->$date = $request->$date;
         $search_obj->$short_desc = $request->$short_desc;
         $search_obj->$description = $request->$description;
         $search_obj->save();
       }

       Session::put('lang','');
       Log::info($id." $media->type updated by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
       return Redirect()->route("admin_".$media->type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $media = Media::findOrFail($id);
        $type = $media->type;
        // File::delete(public_path().'../uploads/media/'.$type.'/'.$media->image);
        $path = 'uploads/'.$type.'/'.$media->image;
        $path_thumb = 'uploads/'.$type.'/'.$media->image_thumb;
        File::delete($path);
        File::delete($path_thumb);
        $search = Search::where('table_name','media')->where('table_id',$id);
        $search->delete();
        $media->delete();
        Log::info($id." $type deleted by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('admin_'.$type);
    }

     public function news()
    {
        $news = DB::table('media')->where('type','news')->orderBy('id','desc')->get();
        return view('admin.news')->with('news',$news);
    }

    public function articles()
    {
        $articles = DB::table('media')->where('type','article')->orderBy('id','desc')->get();
        return view('admin.articles')->with('articles',$articles);
    }
}
