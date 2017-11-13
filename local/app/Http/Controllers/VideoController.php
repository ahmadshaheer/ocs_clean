<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Search;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('admin.videos')->with('videos',$video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_video');
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
        $video = new video();
        if($lang=='en') {
          $this->validate($request,[
            'title_en'=>'required|unique:videos|max:255',
            'date_en'=>'required',
            'video'=>'required',
          ]);
          $video->title_en = $request->input('title_en');
          $video->date_en = $request->input('date_en');
          $video->url_en = $request->input('video');
        }
        else if($lang=='dr') {
          $this->validate($request,[
            'title_dr'=>'required|unique:videos|max:255',
            'date_dr'=>'required',
            'video_dr'=>'required',
          ]);
          $video->title_dr = $request->input('title_dr');
          $video->date_dr = $request->input('date_dr');
          $video->url_dr = $request->input('video_dr');
        }
        else if($lang=='pa') {
          $this->validate($request,[
            'title_pa'=>'required|unique:videos|max:255',
            'date_dr'=>'required',
            'video_pa'=>'required',
          ]);
          $video->title_pa = $request->input('title_pa');
          $video->date_pa = $request->input('date_dr');
          $video->url_pa = $request->input('video_pa');
        }
        if($video->save()){
            $search = new Search();
            if($lang=='en') {
              $search->title_en = $request->input('title');
              $search->date_en = $request->input('date');
            }
            else if($lang=='dr') {
              $search->title_dr = $request->input('title_dr');
              $search->date_dr = $request->input('date_dr');
            }
            else if($lang=='pa') {
              $search->title_pa = $request->input('title_pa');
              $search->date_pa = $request->input('date_dr');
            }
            $search->table_name = 'videos';
            $search->type = 'video';
            $search->table_id = $video->id;
            $search->save();
        }
        \Session::put('lang','');
        return Redirect()->route('videos.index');
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
        $video = video::findOrFail($id);
        return view('admin.edit_video')->with('video',$video);
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
        $video =video::findOrFail($id);
        if($lang=='en') {
          $this->validate($request,[
            'title_en'=>'required|unique:videos|max:255',
            'date_en'=>'required',
            'video'=>'required',
          ]);
          $video->title_en = $request->input('title');
          $video->date_en = $request->input('date');
          $video->url_en = $request->input('video');
        }
        else if($lang=='dr') {
          $this->validate($request,[
            'title_dr'=>'required|unique:videos|max:255',
            'date_dr'=>'required',
            'video_dr'=>'required',
          ]);
          $video->title_dr = $request->input('title_dr');
          $video->date_dr = $request->input('date_dr');
          $video->url_dr = $request->input('video_dr');
        }
        else if($lang=='pa') {
          $this->validate($request,[
            'title_pa'=>'required|unique:videos|max:255',
            'date_dr'=>'required',
            'video_pa'=>'required',
          ]);
          $video->title_pa = $request->input('title_pa');
          $video->date_pa = $request->input('date_dr');
          $video->url_pa = $request->input('video_pa');
        }
        if($video->save()){
                $search = Search::where('table_name','=','videos')->where('table_id','=',$id)->first();
                if($lang=='en') {
                  $search->title_en = $request->input('title');
                  $search->date_en = $request->input('date');
                }
                else if($lang=='dr') {
                  $search->title_dr = $request->input('title_dr');
                  $search->date_dr = $request->input('date_dr');
                }
                else if($lang=='pa') {
                  $search->title_pa = $request->input('title_pa');
                  $search->date_pa = $request->input('date_dr');
                }
                $search->table_name = 'videos';
                $search->type = 'video';
                $search->table_id = $video->id;
                $search->save();
        }
        \Session::put('lang','');
        return Redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::findOrFail($id);
        if($video->delete()){
            $search = Search::where('table_name','=','videos')->where('table_id','=',$id)->first();
            $search->delete();
        }
        return view('videos.index');
    }
}
