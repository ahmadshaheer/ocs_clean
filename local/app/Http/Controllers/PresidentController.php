<?php

namespace App\Http\Controllers;

use App\President;
use Illuminate\Http\Request;
use DB;
use File;
use App\Search;
use Session;
use URL;
use Intervention\Image\ImageManager;

class PresidentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = \Session::get('lang');
        $search_image = '';
        $the_president = new President();
        if($lang == 'en'){
            $this->validate($request,[
              'title_en'=>'required',
              'date_en'=>'required',
              'short_desc_en'=>'required',
              'desc_en'=>'required',
              'image'=>'required|mimes:jpg,png,bmp',
            ]);
            $the_president->title_en = $request->input('title_en');
            $the_president->date_en = $request->input('date_en');
            $the_president->short_desc_en = $request->input('short_desc_en');
            $the_president->description_en = $request->input('desc_en');
        }
        else if($lang == 'dr'){
            $this->validate($request,[
              'title_dr'=>'required',
              'date_dr'=>'required',
              'short_desc_dr'=>'required',
              'desc_dr'=>'required',
              'image'=>'required|mimes:jpg,png,bmp',
            ]);
            $the_president->title_dr = $request->input('title_dr');
            $the_president->date_dr = $request->input('date_dr');
             $the_president->short_desc_dr = $request->input('short_desc_dr');
            $the_president->description_dr = $request->input('desc_dr');
        }
        else{
            $this->validate($request,[
              'title_pa'=>'required',
              'date_dr'=>'required',
              'short_desc_pa'=>'required',
              'desc_pa'=>'required',
              'image'=>'required|mimes:jpg,png,bmp',
            ]);
            $the_president->title_pa = $request->input('title_pa');
            $the_president->date_pa = $request->input('date_dr');
             $the_president->short_desc_pa = $request->input('short_desc_pa');
            $the_president->description_pa = $request->input('desc_pa');

        }


            $the_president->type = $request->input('type');
            $the_president->save();

          if($the_president->type!='order' AND $the_president->type!='decree') {
              $max = $the_president->id;
            // thumbnail generation starts
            $image = $request->image;
            $img = $max.'.'.$image->getClientOriginalExtension();
            $img_thumb = $max.'_t.'.$image->getClientOriginalExtension();
            $driver = new imageManager(array('driver'=>'gd'));
            $thumb_img = $driver->make($image)->resize(200,150);
            $thumb_img->save("uploads/".$the_president->type."/".$img_thumb);
            // thumbnail generation Ends

            $img = $max.'.'.$image->getClientOriginalExtension();
            $image->move('uploads/'.$request->input('type'),$img);
            $pr = President::findOrFail($max);
            $pr->image = $img;
            // assign thumb image to image_thumb column in db
            $pr->image_thumb = $img_thumb;

            $pr->image =$img;

            $search_image = "uploads/".$the_president->type."/".$img_thumb;
            }
              if($pr->save()){
                $search = new Search();
                if($lang =='en'){
                    $search->title_en = $request->input('title');
                    $search->date_en = $request->input('date');
                    $search->short_desc_en = $request->input('short_desc_en');
                    $search->description_en = $request->input('desc_en');
                }
                else if($lang=='dr'){
                    $search->title_dr = $request->input('title_dr');
                    $search->date_dr = $request->input('date_dr');
                    $search->short_desc_dr = $request->input('short_desc_dr');
                    $search->description_dr = $request->input('desc_dr');
                }
                else{
                    $search->title_pa = $request->input('title_pa');
                    $search->date_pa = $request->input('date_dr');
                    $search->short_desc_pa = $request->input('short_desc_pa');
                    $search->description_pa = $request->input('desc_pa');
                }

                $search->table_name = 'president';
                $search->type = $request->input('type');
                $search->table_id = $max;
                $search->image_thumb = $search_image;
                $search->save();
        }
        \Session::put('lang','');
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
        $the_president = President::findOrFail($id);
        return view('admin.edit_order')->with('the_president',$the_president);
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
        $the_president = President::findOrFail($id);
        $lang = \Session::get('lang');
        $search_image = '';
        if($lang =='en'){
                $this->validate($request,[
                  'title_en'=>'required',
                  'date_en'=>'required',
                  'short_desc_en'=>'required',
                  'desc_en'=>'required',
                  'image'=>'required|mimes:jpg,png,bmp',
                ]);
                $the_president->title_en = $request->input('title_en');
                $the_president->date_en = $request->input('date_en');
                $the_president->short_desc_en = $request->input('short_desc_en');
                $the_president->description_en = $request->input('desc_en');
        }
        else if($lang =='dr'){
                $this->validate($request,[
                  'title_dr'=>'required',
                  'date_dr'=>'required',
                  'short_desc_dr'=>'required',
                  'desc_dr'=>'required',
                  'image'=>'required|mimes:jpg,png,bmp',
                ]);
                $the_president->title_dr = $request->input('title_dr');
                $the_president->date_dr = $request->input('date_dr');
                $the_president->short_desc_dr = $request->input('short_desc_dr');
                $the_president->description_dr = $request->input('desc_dr');
        }
        else{
                $this->validate($request,[
                  'title_pa'=>'required',
                  'date_dr'=>'required',
                  'short_desc_pa'=>'required',
                  'desc_pa'=>'required',
                  'image'=>'required|mimes:jpg,png,bmp',
                ]);
                $the_president->title_pa = $request->input('title_pa');
                $the_president->date_pa = $request->input('date_dr');
                $the_president->short_desc_pa = $request->input('short_desc_pa');
                $the_president->description_pa = $request->input('desc_pa');

        }

        $the_president->type = $request->input('type');
        $max = $the_president->id;
        $image = '';
        if($request->file('image') ==null){
            $image = $the_president->image;
        }
        else{
            File::delete('uploads/'.$request->input('type').'/'.$the_president->image);

             // generating thumbnail image for display in home and other pages
            $img_thumb = $max.'_t.'.$request->file('image')->getClientOriginalExtension();
            $data = $request->image;
            $driver = new imageManager(array('driver'=>'gd'));
            $thumb_img = $driver->make($data)->resize(200,150);
            $thumb_img->save("uploads/".$request->input('type').'/'.$img_thumb);
            $the_president->image_thumb = $img_thumb;
            // thumbnail generation Ends

            $image = $max.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/'.$request->input('type'),$image);
            $search_image = 'uploads/'.$request->input('type').'/'.$image;
        }
        $the_president->image = $image;

        if($the_president->save()){
                $search = Search::where('table_name','=','president')->where('table_id','=',$id)->first();
                 if($lang =='en'){
                    $search->title_en = $request->input('title');
                    $search->date_en = $request->input('date');
                    $search->short_desc_en = $request->input('short_desc_en');
                    $search->description_en = $request->input('desc_en');
                }
                else if($lang=='dr'){
                    $search->title_dr = $request->input('title_dr');
                    $search->date_dr = $request->input('date_dr');
                    $search->short_desc_dr = $request->input('short_desc_dr');
                    $search->description_dr = $request->input('desc_dr');
                }
                else{
                    $search->title_pa = $request->input('title_pa');
                    $search->date_pa = $request->input('date_dr');
                    $search->short_desc_pa = $request->input('short_desc_pa');
                    $search->description_pa = $request->input('desc_pa');
                }
                $search->table_name = 'president';
                $search->type = $request->input('type');
                $search->table_id = $the_president->id;
                $search->image_thumb = $search_image;
                $search->save();
        }
        \Session::put('lang','');
        return Redirect()->route("admin_".$request->type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $president = President::findOrFail($id);
        $type = $president->type;
        File::delete('uploads/'.$type.'/'.$president->image);
        $search = Search::where('table_name','president')->where('table_id',$id);
        $search->delete();
        $president->delete();
        return Redirect()->route('admin_'.$type);
    }

    public function decrees()
    {
        $decrees = DB::table('president')->where('type','decree')->get();
        return view('admin.decrees')->with('decrees',$decrees);
    }

    public function orders()
    {
        $orders = DB::table('president')->where('type','order')->get();
        // print_r($orders);exit;
        return view('admin.orders')->with('orders',$orders);
    }

    public function statements()
    {
        $statements = DB::table('president')->where('type','statement')->get();
        return view('admin.statements')->with('statements',$statements);
    }
    public function messages()
    {
        $messages = DB::table('president')->where('type','message')->get();
        return view('admin.messages')->with('messages',$messages);
    }
    public function words()
    {
        $words = DB::table('president')->where('type','word')->get();
        return view('admin.words')->with('words',$words);
    }
}
