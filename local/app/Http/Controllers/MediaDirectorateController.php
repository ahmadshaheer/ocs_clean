<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaDirectorate;
use Log;

class MediaDirectorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $media = MediaDirectorate::all();
      return view('admin.media_directorate')->with('media',$media);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_media_directorate');
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
      $media = new MediaDirectorate();
      if($lang=='en') {
        $this->validate($request,[
          'desc_en'=>'required'
        ]);
        $media->description_en = $request->input('desc_en');
      }
      else if($lang=='dr') {
        $this->validate($request,[
          'desc_dr'=>'required'
        ]);
        $media->description_dr = $request->input('desc_dr');
      }
      else if($lang=='pa') {
        $this->validate($request,[
          'desc_pa'=>'required'
        ]);
        $media->description_pa = $request->input('desc_pa');
      }
      $media->save();
      \Session::put('lang','');
      Log::info($media->id." Media Directorate created by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
      return Redirect()->route('media_directorate.index');
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
        $media = MediaDirectorate::findOrFail($id);
        return view('admin.edit_media_directorate')->with('media',$media);
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
      
      $lang = \Session::get('lang');
      $media =MediaDirectorate::findOrFail($id);
      if($lang=='en') {
          $this->validate($request,[
            'desc_en'=>'required'
          ]);
          $media->description_en = $request->input('desc_en');
      }
      else if($lang=='dr') {
          $this->validate($request,[
            'desc_dr'=>'required'
          ]);
          $media->description_dr = $request->input('desc_dr');
      }
      else if($lang=='pa') {
          $this->validate($request,[
            'desc_pa'=>'required'
          ]);
          $media->description_pa = $request->input('desc_pa');
      }
      $media->save();
      \Session::put('lang','');
      Log::info($id." Media Directorate updated by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
      return Redirect()->route('media_directorate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
      $media = MediaDirectorate::findOrFail($id);
      $media->delete();
      Log::info($id." Media Directorate deleted by ".Session::get('email')." on ".date('l jS \of F Y h:i:s A'));
      return Redirect()->route('media_directorate.index');
    }
}
