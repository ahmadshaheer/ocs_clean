<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bio;
use Session;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bio = Bio::all();
        return view('admin.bio')->with('bio',$bio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_bio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bio = new Bio();
        $lang = Session::get('lang');
        if($lang == 'en'){
            $this->validate($request,[
              'bio_en'=>'required',
            ]);
            $bio->bio_en = $request->input('bio_en');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'bio_dr'=>'required',
            ]);
            $bio->bio_dr = $request->input('bio_dr');
        }
        else{
            $this->validate($request,[
              'bio_pa'=>'required',
            ]);
            $bio->bio_pa = $request->input('bio_pa');
        }
        $bio->save();
        Session::put('lang','');
        return Redirect()->route('the_bio.index');
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
        $bio = Bio::findOrFail($id);
        return view('admin.edit_bio')->with('bio',$bio);
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
        $bio =Bio::findOrFail($id);
         $lang = Session::get('lang');
        if($lang == 'en'){
            $this->validate($request,[
              'bio_en'=>'required',
            ]);
            $bio->bio_en = $request->input('bio_en');
        }
        else if($lang=='dr'){
            $this->validate($request,[
              'bio_dr'=>'required',
            ]);
            $bio->bio_dr = $request->input('bio_dr');
        }
        else{
            $this->validate($request,[
              'bio_pa'=>'required',
            ]);
            $bio->bio_pa = $request->input('bio_pa');
        }
        $bio->save();
        Session::put('lang','');
        return Redirect()->route('the_bio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bio = Bio::findOrFail($id);
        $bio->delete();
        return Redirect()->route('the_bio.index');
    }
}
