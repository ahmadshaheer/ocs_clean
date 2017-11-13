<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OCS;
use Session;

class OCSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ocs = OCS::all();
        return view('admin.ocs')->with('ocs',$ocs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_ocs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ocs = new OCS();
        $lang = Session::get('lang');
        if($lang=='en') {
            $this->validate($request,[
              'desc_en'=>'required|'
            ]);
            $ocs->description_en = $request->input('desc_en');
        }
        else if($lang=='dr') {
            $this->validate($request,[
              'desc_dr'=>'required|'
            ]);
            $ocs->description_dr = $request->input('desc_dr');
        }
        else if($lang=='pa') {
            $this->validate($request,[
              'desc_pa'=>'required|'
            ]);
            $ocs->description_pa = $request->input('desc_pa');
        }
        $ocs->save();
        \Session::put('lang','');
        return Redirect()->route('the_ocs.index');
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
        $ocs = OCS::findOrFail($id);
        return view('admin.edit_ocs')->with('ocs',$ocs);
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
      $ocs =OCS::findOrFail($id);
      if($lang=='en') {
        $this->validate($request,[
          'desc_en'=>'required|'
        ]);
        $ocs->description_en = $request->input('desc_en');
      }
      else if($lang=='dr') {
        $this->validate($request,[
          'desc_dr'=>'required|'
        ]);
        $ocs->description_dr = $request->input('desc_dr');
      }
      else if($lang=='pa') {
        $this->validate($request,[
          'desc_pa'=>'required|'
        ]);
        $ocs->description_pa = $request->input('desc_pa');
      }
      \Session::put('lang','');
      $ocs->save();
return Redirect()->route('the_ocs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ocs = OCS::findOrFail($id);
        $ocs->delete();
        return Redirect()->route('the_ocs.index');
    }
}
