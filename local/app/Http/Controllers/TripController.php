<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use DB;
use App\Search;
use File;
use Log;

class TripController extends Controller
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
        return view('admin.create_trip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $lang=\Session::get('lang');
        $search_image = '';
        $trip = new Trip();
        if($lang=='en') {
          $this->validate($request,[
            'title_en'=>'required|unique:trips|max:255',
            'date_en'=>'required',
            'short_desc_en'=>'required',
            'desc_en'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp'
          ]);
          $trip->title_en = $request->input('title_en');
          $trip->date_en = $request->input('date_en');
          $trip->short_desc_en = $request->input('short_desc_en');
          $trip->description_en = $request->input('desc_en');
        }
        else if($lang=='dr') {
          $this->validate($request,[
            'title_dr'=>'required|unique:trips|max:255',
            'date_dr'=>'required',
            'short_desc_dr'=>'required',
            'desc_dr'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp'
          ]);
          $trip->title_dr = $request->input('title_dr');
          $trip->date_dr = $request->input('date_dr');
          $trip->short_desc_dr = $request->input('short_desc_dr');
          $trip->description_dr = $request->input('desc_dr');
        }
        else if($lang=='pa') {
          $this->validate($request,[
            'title_pa'=>'required|unique:trips|max:255',
            'date_dr'=>'required',
            'short_desc_pa'=>'required',
            'desc_pa'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,bmp'
          ]);
          $trip->title_pa = $request->input('title_pa');
          $trip->date_pa = $request->input('date_dr');
          $trip->short_desc_pa = $request->input('short_desc_pa');
          $trip->description_pa = $request->input('desc_pa');
        }
        $trip->type = $request->input('type');
        $trip->save();

        $max = $trip->id;
        $img = $max.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/trips/'.$request->type,$img);
        $trip_n = Trip::findOrFail($max);
        $trip_n->image = $img;
        $search_image = 'uploads/trips/'.$request->type.'/'.$img;

        if($trip_n->save()){
            $search = new Search();
            if($lang=='en') {
              $search->title_en = $request->input('title');
              $search->date_en = $request->input('date');
              $search->short_desc_en = $request->input('short_desc_en');
              $search->description_en = $request->input('desc_en');
            }
            else if($lang=='dr') {
              $search->title_dr = $request->input('title_dr');
              $search->date_dr = $request->input('date_dr');
              $search->short_desc_dr = $request->input('short_desc_dr');
              $search->description_dr = $request->input('desc_dr');
            }
            else if($lang=='pa') {
              $search->title_pa = $request->input('title_pa');
              $search->date_pa = $request->input('date_dr');
              $search->short_desc_pa = $request->input('short_desc_pa');
              $search->description_pa = $request->input('desc_pa');
            }
            $type = ($request->input('type')=='domestic')?'domestic':'international_trip';
            $search->type = $type;
            $search->table_name = 'trips';
            $search->table_id = $max;
            $search->image_thumb = $search_image;
            $search->save();
        }
        \Session::put('lang','');
        \Session::put('type','');
        Log::info($max." Trip created by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('admin_'.$trip->type);
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
        $trip = Trip::findOrFail($id);
        return view('admin.edit_trip')->with('trip',$trip);
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
        
        $lang=\Session::get('lang');
        $search_image ='';
        $trip = Trip::findOrFail($id);
        if($lang=='en') {
          $this->validate($request,[
            'title_en'=>'required|unique:trips|max:255',
            'date_en'=>'required',
            'short_desc_en'=>'required',
            'desc_en'=>'required',
          ]);
          $trip->title_en = $request->input('title_en');
          $trip->date_en = $request->input('date_en');
          $trip->short_desc_en = $request->input('short_desc_en');
          $trip->description_en = $request->input('desc_en');
        }
        else if($lang=='dr') {
          $this->validate($request,[
            'title_dr'=>'required|unique:trips|max:255',
            'date_dr'=>'required',
            'short_desc_dr'=>'required',
            'desc_dr'=>'required',
          ]);
          $trip->title_dr = $request->input('title_dr');
          $trip->date_dr = $request->input('date_dr');
          $trip->short_desc_dr = $request->input('short_desc_dr');
          $trip->description_dr = $request->input('desc_dr');
        }
        else if($lang=='pa') {
          $this->validate($request,[
            'title_pa'=>'required|unique:trips|max:255',
            'date_dr'=>'required',
            'short_desc_pa'=>'required',
            'desc_pa'=>'required',
          ]);
          $trip->title_pa = $request->input('title_pa');
          $trip->date_pa = $request->input('date_dr');
          $trip->short_desc_pa = $request->input('short_desc_pa');
          $trip->description_pa = $request->input('desc_pa');
        }

        $trip->type = $request->input('type');
        $max = $trip->id;
        $image = '';
        if($request->file('image') ==null){
            $image = $trip->image;
            $search_image = 'uploads/trips/'.$request->input('type').'/'.$trip->image;
        }
        else{
            File::delete('uploads/trips/'.$request->input('type').'/'.$trip->image);
            $image = $max.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/trips/'.$request->input('type'),$image);
            $search_image = 'uploads/trips/'.$request->input('type').'/'.$image;
        }
        $trip->image = $image;
        if($trip->save()){
                $search = Search::where('table_name','=','trips')->where('table_id','=',$id)->first();
                if($lang=='en') {
                  $search->title_en = $request->input('title');
                  $search->date_en = $request->input('date');
                  $search->short_desc_en =
                  $request->input('short_desc_en');
                  $search->description_en = $request->input('desc_en');
                }
                else if($lang=='dr') {
                  $search->title_dr = $request->input('title_dr');
                  $search->date_dr = $request->input('date_dr');
                  $search->short_desc_dr =
                  $request->input('short_desc_dr');
                  $search->description_dr = $request->input('desc_dr');
                }
                else if($lang=='pa') {
                  $search->title_pa = $request->input('title_pa');
                  $search->date_pa = $request->input('date_dr');
                  $search->short_desc_pa = $request->input('short_desc_pa');
                  $search->description_pa = $request->input('desc_pa');
                }
                $type = ($request->input('type')=='domestic')?'domestic':'international_trip';
                $search->type = $type;
                $search->type = $type;
                $search->table_name = 'trips';
                $search->table_id = $trip->id;
                $search->image_thumb = $search_image;
                $search->save();
        }
        \Session::put('lang','');
        Log::info($id." Trip updated by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('admin_'.$trip->type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $trip = Trip::findOrFail($id);
        $type = $trip->type;
        File::delete('uploads/trips/'.$type.'/'.$trip->image);
        $search = Search::where('table_name','trips')->where('table_id',$id)->first();
        $search->delete();
        $trip->delete();
        Log::info($id." Trip deleted by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
        return Redirect()->route('admin_'.$type);
    }

     public function domestic()
    {
        $domestic = DB::table('trips')->where('type','domestic')->get();
        return view('admin.domestic')->with('domestic',$domestic);
    }

    public function international()
    {
        $international = DB::table('trips')->where('type','international')->get();
        return view('admin.international')->with('international',$international);
    }
}
