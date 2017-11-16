<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use DB;
use App\Search;
use File;
use Session;
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
      $lang=Session::get('lang');
      $media = new Media();
      // print_r($request->input());exit;
      if($lang=='en') {
        $this->validate($request,[
          'title_en'=>'required|unique:media|max:255',
          'date_en'=>'required',
          'short_desc_en'=>'required',
          'desc_en'=>'required',
          'image'=>'required|mimes:jpeg,jpg,png,bmp'
        ]);
        $media->title_en = $request->input('title_en');
        $media->date_en = $request->input('date_en');
        $media->short_desc_en = $request->input('short_desc_en');
        $media->description_en = $request->input('desc_en');
      }
      else if($lang=='dr') {
        $this->validate($request,[
          'title_dr'=>'required|unique:media|max:255',
          'date_dr'=>'required',
          'short_desc_dr'=>'required',
          'desc_dr'=>'required',
          'image'=>'required|mimes:jpeg,jpg,png,bmp'
        ]);
        $media->title_dr = $request->input('title_dr');
        $media->date_dr = $request->input('date_dr');
        $media->short_desc_dr = $request->input('short_desc_dr');
        $media->description_dr = $request->input('desc_dr');
      }
      else if($lang=='pa') {
        $this->validate($request,[
          'title_pa'=>'required|unique:media|max:255',
          'date_dr'=>'required',
          'short_desc_pa'=>'required',
          'desc_pa'=>'required',
          'image'=>'required|mimes:jpeg,jpg,png,bmp'
        ]);
        $media->title_pa = $request->input('title_pa');
        $media->date_pa = $request->input('date_dr');
        $media->short_desc_pa = $request->input('short_desc_pa');
        $media->description_pa = $request->input('desc_pa');
      }
      $media->tags = $request->input('tags_array');
      $media->type = $request->input('type');
      // $media->save();

      $max = $media->id;

      // thumbnail generation starts
      $image = $request->image;
      $img_thumb = $max.'_t.'.$image->getClientOriginalExtension();
      $driver = new imageManager(array('driver'=>'gd'));
      $thumb_img = $driver->make($image)->resize(200,150);
      print_r($thumb_img->save("uploads/media/".$media->type."/".$img_thumb));
      $thumb_img->save("uploads/media/".$media->type."/".$img_thumb);
      // thumbnail generation Ends
      $search_thumb = "uploads/media/".$media->type."/".$img_thumb;


      $img = $max.'.'.$image->getClientOriginalExtension();
      $image->move('uploads/media/'.$request->input('type'),$img);
      $media_n = Media::findOrFail($max);
      $media_n->image = $img;
      // assign thumb image to image_thumb column in db
      $media_n->image_thumb = $img_thumb;


      if($media_n->save()){
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
        $search->type = $request->input('type');
        $search->table_name = 'media';
        $search->table_id = $max;
        $search->image_thumb = $search_thumb;
        $search->save();
        Session::put('lang','');
        Session::put('type','');
        return Redirect()->route('admin_'.$media->type);
    }
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
        $lang=Session::get('lang');
        $media = Media::findOrFail($id);
        $search_pdf = '';
        if($lang=='en') {
          $this->validate($request,[
            'title_en'=>'required|max:255',
            'date_en'=>'required',
            'short_desc_en'=>'required',
            'desc_en'=>'required',
          ]);
          $media->title_en = $request->input('title_en');
          $media->date_en = $request->input('date_en');
          $media->short_desc_en = $request->input('short_desc_en');
          $media->description_en = $request->input('desc_en');
        }
        else if($lang=='dr') {
          $this->validate($request,[
            'title_dr'=>'required|max:255',
            'date_dr'=>'required',
            'short_desc_dr'=>'required',
            'desc_dr'=>'required',
          ]);
          $media->title_dr = $request->input('title_dr');
          $media->date_dr = $request->input('date_dr');
          $media->short_desc_dr = $request->input('short_desc_dr');
          $media->description_dr = $request->input('desc_dr');
        }
        else if($lang=='pa') {
          $this->validate($request,[
            'title_pa'=>'required|max:255',
            'date_dr'=>'required',
            'short_desc_pa'=>'required',
            'desc_pa'=>'required',
          ]);
          $media->title_pa = $request->input('title_pa');
          $media->date_pa = $request->input('date_dr');
          $media->short_desc_pa = $request->input('short_desc_pa');
          $media->description_pa = $request->input('desc_pa');
        }

        $max = $media->id;
        $image = '';
        if($request->file('image') ==null){
            $image = $media->image;
        }
        else{
            File::delete('uploads/media/'.$request->input('type').'/'.$media->image);
            File::delete('uploads/media/'.$request->input('type').'/'.$media->image_thumb);
            // generating thumbnail image for display in home and other pages
            $img_thumb = $max.'_t.'.$request->file('image')->getClientOriginalExtension();
            $data = $request->image;
            $driver = new imageManager(array('driver'=>'gd'));
            $thumb_img = $driver->make($data)->resize(200,150);
            $thumb_img->save("uploads/media/".$media->type."/".$img_thumb);
            $media->image_thumb = $img_thumb;
            // thumbnail generation Ends
            $image = $max.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/media/'.$request->input('type'),$image);
            $search_pdf = 'uploads/media/'.$request->input('type').'/'.$image;
        }
        $media->image = $image;
        $media->type = $request->input('type');
        if($media->save()){
            $search = Search::where('table_name','=','media')->where('table_id','=',$id)->first();
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
            $search->type = $request->input('type');
            $search->table_name = 'media';
            $search->table_id = $id;
            $search->image_thumb = $search_pdf;
            $search->save();
        }
        Session::put('lang','');
        return Redirect()->route('admin_'.$media->type);
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
        $path = 'uploads/media/'.$type.'/'.$media->image;
        $path_thumb = 'uploads/media/'.$type.'/'.$media->image_thumb;
        File::delete($path);
        File::delete($path_thumb);
        $search = Search::where('table_name','media')->where('table_id',$id);
        $search->delete();
        $media->delete();
        return Redirect()->route('admin_'.$type);
    }

     public function news()
    {
        $news = DB::table('media')->where('type','news')->get();
        return view('admin.news')->with('news',$news);
    }

    public function articles()
    {
        $articles = DB::table('media')->where('type','article')->get();
        return view('admin.articles')->with('articles',$articles);
    }
}
