<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\AlbumImage;
use App\Search;
use DB;
use File;
use Session;
use Intervention\Image\ImageManager;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::all();
        return view('admin.album')->with('album',$album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_album');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = Session::get('lang');
        $album = new Album();
        // print_r($request->input('title_en'));exit;
        if($lang=='en') {
          $this->validate($request, [
              'title_en' => 'required|unique:album|max:255',
              'date_en' => 'required',
              'image'=>'required',
          ]);
          //if passes the validation
          $album->title_en = $request->input('title_en');
          $album->date_en = $request->input('date_en');
        }
        else if($lang=='dr') {
          $this->validate($request, [
              'title_dr' => 'required|unique:album|max:255',
              'date_dr' => 'required',
              'image'=>'required',
          ]);
          //if passes the validation
          $album->title_dr = $request->input('title_dr');
          $album->date_dr = $request->input('date_dr');
        }
        else if($lang=='pa') {
          $this->validate($request, [
              'title_pa' => 'required|unique:album|max:255',
              'date_dr' => 'required',
              'image'=>'required',
          ]);
          //if passes the validation
          $album->title_pa = $request->input('title_pa');
          $album->date_pa = $request->input('date_dr');
        }

        $search_image = '';

        $album->save();

        $max = $album->id;

         // thumbnail generation starts
          $image = $request->image;
          $img_thumb = $max.'_t.'.$image->getClientOriginalExtension();
          $driver = new imageManager(array('driver'=>'gd'));
          $thumb_img = $driver->make($image)->resize(200,150);
          $thumb_img->save("uploads/album/".$img_thumb);
          // thumbnail generation Ends
          $search_thumb = 'uploads/album/'.$img_thumb;

        $image = $max.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/album/',$image);
        $album_n = Album::findOrFail($max);
        $album_n->image = $image;
        if($album_n->save()){
                $search = new Search();
                if($lang == 'en'){
                        $search->title_en = $request->input('title');
                        $search->date_en = $request->input('date');
                }
                else if($lang =='dr'){
                        $search->title_dr = $request->input('title_dr');
                        $search->date_dr = $request->input('date_dr');
                }
                else{
                    $search->title_pa = $request->input('title_pa');
                    $search->date_pa = $request->input('date_dr');
                }
                $search->table_name = 'album';
                $search->type = 'album';
                $search->table_id = $max;
                $search->image_thumb = $search_thumb;
                $search->save();
        }
        Session::put('lang','');
        return redirect()->route('album.index');

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
        $album = Album::findOrFail($id);
        return view('admin.edit_album')->with(['album'=>$album]);
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
      $album = Album::findOrFail($id);
      $lang = Session::get('lang');

      if($lang=='en') {
        $this->validate($request, [
            'title_en' => 'required|max:255',
            'date_en' => 'required',
            'image'=>'required',
        ]);
        //if passed the validation then
        $album->title_en = $request->input('title');
        $album->date_en = $request->input('date');
      }
      else if($lang=='dr') {
        $this->validate($request, [
            'title_dr' => 'required|max:255',
            'date_dr' => 'required',
            'image'=>'required',
        ]);
        //if passed the validation then
        $album->title_dr = $request->input('title_dr');
        $album->date_dr = $request->input('date_dr');
      }
      else if($lang=='pa') {
        $this->validate($request, [
            'title_pa' => 'required|max:255',
            'date_dr' => 'required',
            'image'=>'required',
        ]);
        //if passed the validation then
        $album->title_pa = $request->input('title_pa');
        $album->date_pa = $request->input('date_dr');
      }

        $search_image = '';
        $image = '';
        if($request->file('image')==null){
            $image = $album->image;
        }
        else{
            File::delete('uploads/album/'.$album->image);
            File::delete('uploads/album/'.$album->image_thumb);
            // generating thumbnail image for display in home and other pages
            $img_thumb = $max.'_t.'.$request->file('image')->getClientOriginalExtension();
            $data = $request->image;
            $driver = new imageManager(array('driver'=>'gd'));
            $thumb_img = $driver->make($data)->resize(200,150);
            $thumb_img->save("uploads/album/".$img_thumb);
            // thumbnail generation Ends

            $image = $id.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/album/',$image);
            $search_image = 'uploads/album/'.$img_thumb;
        }

        $album->image = $image;
        if($album->save()){
                $search = Search::where('table_name','=','album')->where('table_id','=',$id)->first();
                 if($lang == 'en'){
                        $search->title_en = $request->input('title');
                        $search->date_en = $request->input('date');
                }
                else if($lang =='dr'){
                        $search->title_dr = $request->input('title_dr');
                        $search->date_dr = $request->input('date_dr');
                }
                else{
                    $search->title_pa = $request->input('title_pa');
                    $search->date_pa = $request->input('date_dr');
                }
                $search->table_name = 'album';
                $search->type = 'album';
                $search->table_id = $album->id;
                $search->image_thumb = $search_image;
                $search->save();
        }
        Session::put('lang','');
        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Album::findOrFail($id);
        $search = Search::where('table_name','album')->where('table_id',$id);
        $search->delete();
        $media->delete();
        return Redirect()->route('admin_'.$type);


        // $album = Album::findOrFail($id);
        // $album_images = DB::table('album_image')->where('album_id',$id)->get();
        // if(sizeof($album_images)>0){
        //     foreach ($album_images as $value) {
        //         File::delete(public_path().'../uploads/albumImage/'.$value->image);
        //         $album_image = AlbumImage::findOrFail($value->id);
        //         $album_image->delete();
        // }
        // }
        // File::delete(public_path().'../uploads/album/'.$album->image);
        // File::delete(public_path().'../uploads/album/'.$album->image_thumb);
        // if($album->delete()){
        //     $search = Search::where('table_name','=','album')->where('table_id','=',$id)->get();
        //     $search->delete();
        // }
        // return redirect()->route('album.index');
    }

    public function add_album_image($number,$id){
        return view('admin.add_album_image')->with(['number'=>$number,'id'=>$id]);
    }

    public function add_image(Request $request,$id,$number){
        for ($i=0; $i <$number ; $i++) {
            $album_image = new AlbumImage();
            $album_image->title_en = $request->input('title'.$i);
            $album_image->title_dr = $request->input('title_dr'.$i);
            $album_image->title_pa = $request->input('title_pa'.$i);
            $album_image->album_id = $id;

            $max = AlbumImage::max('id');
            $max +=1;

            $img = $max.'.'.$request->file('image'.$i)->getClientOriginalExtension();
            $request->file('image'.$i)->move('uploads/albumImage/',$img);

            $album_image->image = $img;
            $album_image->save();
        }
        return redirect()->route('album.index');
    }

    public function view_album_images($id){
        $album_images = DB::table('album_image')->where('album_id',$id)->get();
        return view('admin.view_album_images')->with('images',$album_images);
    }

    public function edit_images($id){
        $album_images = DB::table('album_image')->where('album_id',$id)->get();
        return view('admin.edit_album_images')->with(['images'=>$album_images,'id'=>$id]);
    }

    public function edit_album_image($id){
        $album_image = AlbumImage::findOrFail($id);
        return view('admin.edit_album_image')->with('image',$album_image);
    }
    public function update_album_image(Request $request , $id){
        $album_image = AlbumImage::findOrFail($id);
        $album_image->title_en = $request->input('title');
        $album_image->title_dr = $request->input('title_dr');
        $album_image->title_pa = $request->input('title_pa');

        $image = '';
        if($request->file('image')==null){
            $image = $album_image->image;
        }
        else{
            File::delete('uploads/albumImage/'.$album_image->image);
            $image = $id.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/albumImage/',$image);
        }
        $album_image->image = $image;
        $album_image->save();

        return redirect()->route('album.index');
    }

      public function delete_album_image($id,$album_id){
        $album_image = AlbumImage::findOrFail($id);
        File::delete('uploads/albumImage/'.$album_image->image);
        $album_image->delete();
        return \Redirect::to('admin/edit_images/'.$album_id);
    }
}
