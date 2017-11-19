<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;
use Session;
use File;
use Log;
use Intervention\Image\ImageManager;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Links::all();
        return view('admin.links')->with('links',$links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_link');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $links = new Links();
        $lang = Session::get('lang');
        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|unique:links|max:255',
              'desc_en'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_en = $request->input('title');
            $links->description_en = $request->input('desc_en');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'title_dr'=>'required|unique:links|max:255',
              'desc_dr'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_dr = $request->input('title_dr');
            $links->description_dr = $request->input('desc_dr');
        }
        else{
            $this->validate($request,[
              'title_pa'=>'required|unique:links|max:255',
              'desc_pa'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_pa = $request->input('title_pa');
            $links->description_pa = $request->input('desc_pa');
        }

        $links->url = $request->input('url');

        $links->save();

        $max = $links->id;
        // thumbnail generation starts
      $image = $request->image;
      $img_thumb = $max.'.'.$image->getClientOriginalExtension();
      $driver = new imageManager(array('driver'=>'gd'));
      $thumb_img = $driver->make($image)->resize(200,150);
      $thumb_img->save("uploads/links/".$img_thumb);
      // thumbnail generation Ends

        $links_n = Links::findOrFail($max);
        $links_n->image = $img_thumb;
        $links_n->save();
        Session::put('lang','');
        Log::info($max." Link created by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('links.index');
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
        $link = Links::findOrFail($id);
        return view('admin.edit_link')->with('link',$link);
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
        
        $links = Links::findOrFail($id);
        $lang = Session::get('lang');
        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|unique:links|max:255',
              'desc_en'=>'required',
              'image'=>'mimes:jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_en = $request->input('title_en');
            $links->description_en = $request->input('desc_en');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'title_dr'=>'required|unique:links|max:255',
              'desc_dr'=>'required',
              'image'=>'mimes:jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_dr = $request->input('title_dr');
            $links->description_dr = $request->input('desc_dr');
        }
        else{
            $this->validate($request,[
              'title_pa'=>'required|unique:links|max:255',
              'desc_pa'=>'required',
              'image'=>'mimes:jpg,png,bmp',
              'url'=>'required'
            ]);
            $links->title_pa = $request->input('title_pa');
            $links->description_pa = $request->input('desc_pa');
        }
        $links->url = $request->input('url');

        $max = $links->id;
        $image = '';

        if($request->file('image') ==null){
            $image = $links->image;
        }
        else{
            File::delete('uploads/links/'.$links->image);
            // thumbnail generation starts
          $image = $request->image;
          $img_thumb = $max.'.'.$image->getClientOriginalExtension();
          $driver = new imageManager(array('driver'=>'gd'));
          $thumb_img = $driver->make($image)->resize(200,150);
          $thumb_img->save("uploads/links/".$img_thumb);
          // thumbnail generation Ends
        }
        $links->image = $img_thumb;
        $links->save();
        Session::put('lang','');
        Log::info($id." Link updated by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $link = Links::findOrFail($id);
        File::delete('uploads/links/'.$link->image);
        $link->delete();
        Log::info($id." Link deleted by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('links.index');
    }
}
