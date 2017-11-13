<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chief;
use Session;
class ChiefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chief = Chief::all();
        return view('admin.chief')->with('chief',$chief);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_chief');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chief = new Chief();
        $lang = Session::get('lang');
        if($lang=='en'){
            $this->validate($request,[
              'desc_en'=>'required',
            ]);
            $chief->desc_en = $request->input('desc_en');
        }
        else if($lang =='dr'){
            $this->validate($request,[
              'desc_dr'=>'required',
            ]);
            $chief->desc_dr = $request->input('desc_dr');
        }
        else{
            $this->validate($request,[
              'desc_pa'=>'required',
            ]);
            $chief->desc_pa = $request->input('desc_pa');
        }
        $chief->save();
        Session::put('lang','');
        return Redirect()->route('the_chief.index');
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
        $chief = Chief::findOrFail($id);
        return view('admin.edit_chief')->with('chief',$chief);
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
       $chief =Chief::findOrFail($id);
       $lang = Session::get('lang');
       if($lang=='en'){
           $this->validate($request,[
             'desc_en'=>'required',
           ]);
           $chief->desc_en = $request->input('desc_en');
       }
       else if($lang =='dr'){
           $this->validate($request,[
             'desc_dr'=>'required',
           ]);
           $chief->desc_dr = $request->input('desc_dr');
       }
       else{
           $this->validate($request,[
             'desc_pa'=>'required',
           ]);
           $chief->desc_pa = $request->input('desc_pa');
       }
        $chief->save();
        Session::put('lang','');
        return Redirect()->route('the_chief.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chief = Chief::findOrFail($id);
        $chief->delete();
        return Redirect()->route('the_chief.index');
    }
}
