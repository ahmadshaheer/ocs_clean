<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoGraphic;
use App\Search;
use Session;
use File;
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
        $info = InfoGraphic::all();
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
        $info = new InfoGraphic();

        $lang = Session::get('lang');
        $search_image = '';

        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|unique:infographics|max:255',
              'date_en'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp'
            ]);
            $info->title_en = $request->input('title_en');
            $info->date_en = $request->input('date_en');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'title_dr'=>'required|unique:infographics|max:255',
              'date_dr'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp'
            ]);
            $info->title_dr = $request->input('title_dr');
            $info->date_dr = $request->input('date_dr');
        }
        else{
            $this->validate($request,[
              'title_pa'=>'required|unique:infographics|max:255',
              'date_dr'=>'required',
              'image'=>'required|mimes:jpeg,jpg,png,bmp'
            ]);
            $info->title_pa = $request->input('title_pa');
            $info->date_pa = $request->input('date_dr');
        }

        $info->save();
        $max = $info->id;

        // thumbnail generation starts
      $image = $request->image;
      $img_thumb = $max.'_t.'.$image->getClientOriginalExtension();
      $driver = new imageManager(array('driver'=>'gd'));
      $thumb_img = $driver->make($image)->resize(150,200);
      $thumb_img->save("uploads/infographics/".$img_thumb);
      // thumbnail generation Ends
      $search_thumb = 'uploads/infographics/'.$img_thumb;


        $image = $max.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/infographics/',$image);
        $info_n = InfoGraphic::findOrFail($max);
        $info_n->image = $image;
        $info_n->image_thumb = $img_thumb;
        if($info_n->save()){
                $search = new Search();
                if($lang=='en'){
                    $search->title_en = $request->input('title');
                    $search->date_en = $request->input('date');
                }
                else if($lang=='dr'){
                    $search->title_dr = $request->input('title_dr');
                    $search->date_dr = $request->input('date_dr');
                }
                else{
                    $search->title_pa = $request->input('title_pa');
                    $search->date_pa = $request->input('date_dr');
                }

                $search->table_name = 'infographics';
                $search->type = 'infographic';
                $search->table_id = $max;
                $search->image_thumb = $search_thumb;
                $search->save();

        }
        Session::put('lang','');
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
        $info = InfoGraphic::findOrFail($id);
        $lang = Session::get('lang');
        $search_image = '';
        $img_thumb ='';
        if($lang=='en'){
            $this->validate($request,[
              'title_en'=>'required|unique:infographics|max:255',
              'date_en'=>'required',
              'image'=>'mimes:jpeg,bmp,png'
            ]);
            $info->title_en = $request->input('title');
            $info->date_en = $request->input('date');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'title_dr'=>'required|unique:infographics|max:255',
              'date_dr'=>'required',
              'image'=>'mimes:jpeg,bmp,png'
            ]);
            $info->title_dr = $request->input('title_dr');
            $info->date_dr = $request->input('date_dr');
        }
        else if($lang=='pa'){
            $this->validate($request,[
              'title_pa'=>'required|unique:infographics|max:255',
              'date_dr'=>'required',
              'image'=>'mimes:jpeg,bmp,png'
            ]);
            $info->title_pa = $request->input('title_pa');
            $info->date_pa = $request->input('date_dr');
        }
        $image = '';

        if($request->file('image')==null){
            $image = $info->image;
        }
        else{
            File::delete('uploads/infographics/'.$info->image);
             // generating thumbnail image for display in home and other pages
            $img_thumb = $max.'_t.'.$request->file('image')->getClientOriginalExtension();
            $data = $request->image;
            $driver = new imageManager(array('driver'=>'gd'));
            $thumb_img = $driver->make($data)->resize(150,200);
            $thumb_img->save("uploads/infographics/".$img_thumb);
            // thumbnail generation Ends

            $image = $id.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/infographics/',$image);
            $search_image = 'uploads/infographics/'.$img_thumb;
        }

        $info->image = $image;
        $info->image_thumb = $img_thumb;
        if($info->save()){
          $search = Search::where('table_name','=','infographics')->where('table_id','=',$id)->first();
           if($lang=='en'){
              $search->title_en = $request->input('title');
              $search->date_en = $request->input('date');
          }
          else if($lang=='dr'){
              $search->title_dr = $request->input('title_dr');
              $search->date_dr = $request->input('date_dr');
          }
          else{
              $search->title_pa = $request->input('title_pa');
              // print_r($request->input('title_pa'));exit;
              $search->date_pa = $request->input('date_dr');
          }
          $search->table_name = 'infographics';
          $search->type = 'infographic';
          $search->table_id = $info->id;
          $search->image_thumb = $search_image;
          $search->save();
        }
        Session::put('lang','');
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
        $search = Search::where('table_name','info')->where('table_id',$id);
        $search->delete();
        $info->delete();
        return Redirect()->route('infographic.index');
    }
}
