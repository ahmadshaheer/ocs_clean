<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoGraphic;
use App\Search;
use Session;
use File;
use Log;
use Intervention\Image\ImageManager;

class InfoGraphicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = InfoGraphic::orderBy('id','desc')->get();
        return view('admin.infographics')->with('info',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_infographic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // multi language variables
        $lang = Session::get('lang');
        $title = 'title_'.$lang;
        $date = 'date_'.$lang;

        // validation
          $this->validate($request,[
            $title=>'required',
            $date=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,svg',
          ]);

        //data storage
         $info = new InfoGraphic();
         $info->$title = $request->$title;
         $info->$date = $request->$date;

         //save the record to retreive id later
         $info->save();

         //retreive id from previously stored record
          $id = $info->id;

          //retreive info graphic object again
          $info = InfoGraphic::findOrFail($id);


          //make image path
          $path = 'uploads/infographics/';

          //variable for thumb image if present or otherwise
          $image_thumb_name = '';

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
            $info->image = $image_name;
            $info->image_thumb = $image_thumb_name;

         }
          else {
            //if image not present for search table
            $image_thumb_name = 'default.jpg';

            //if no image received store the default
            $info->image = 'default.jpg';
            $info->image_thumb = 'thumb.jpg';
          }
           if($info->save()) {
              //search stuff
              $search = new Search();
              $search->$title = $request->$title;
              $search->$date = $request->$date;
              
              $search->table_name = 'infographics';
              $search->type = 'infographic';
              $search->table_id = $id;
              $search->image_thumb = $path.$image_thumb_name;
              $search->save();
            }
            Session::put('lang','');
            Log::info($id." InfoGraphics record created by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
            return Redirect()->route('infographic.index');
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
        $info = InfoGraphic::findOrFail($id);
        return view('admin.edit_infographic')->with('info',$info);

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
        // validation
        $this->validate($request,[
          $title=>'required',
        ]);

        // info graphics data storage
         $info = InfoGraphic::findOrFail($id);
         $search_obj = Search::where('table_name','=','infographics')->where('table_id','=',$id)->first();
         $info->$title = $request->$title;
         if($request->$date!='') {
           $info->$date = $request->$date;
         }

          if($request->image!=null) {

            // validation
              $this->validate($request,[
                'image'=>'required|mimes:jpg,jpeg,png,svg,bmp',
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
             $image_path = 'uploads/infographics/';

             //move i.e.(to storage) image
             $image_thumb->save($image_path.$image_thumb_name);
             $request->image->move($image_path,$image_name);

             //store in db
             $info->image = $image_name;
             $info->image_thumb = $image_thumb_name;
           }

           if($info->save()) {
               $search_obj->$title = $request->$title;
               $search_obj->$date = $request->$date;
               $search_obj->save();
             }
             Session::put('lang','');
             Log::info($id." $info->type updated by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
             return Redirect()->route('infographic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $info = InfoGraphic::findOrFail($id);
        File::delete('uploads/infographics/'.$info->image);
        File::delete('uploads/infographics/'.$info->image_thumb);
        $search = Search::where('table_name','infographics')->where('table_id',$id);
        $search->delete();
        $info->delete();
        Log::info($id." InfoGraphic deleted by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('infographic.index');
    }
}
