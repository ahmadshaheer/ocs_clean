<?php

namespace App\Http\Controllers;
use App\Quotes;
use Illuminate\Http\Request;
use File;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quotes::all();
        return view('admin.quotes')->with('quotes',$quotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_quote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = new Quotes();
        $this->validate($request,[
          'title'=>'required|unique:quotes|max:255',
          'image'=>'required|mimes:jpg,png,bmp',
        ]);
        $quote->title = $request->input('title');
        $quote->save();
        $max = $quote->id;
        $imageName = '';
        if($request->image == null){
            $imageName = 'default.png';
        }
        else{
        $imageName = $max.'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move('uploads/quotes',$imageName);

        }
        $quote_n = Quotes::findOrFail($max);
        $quote_n->image = $imageName;
        $quote_n->save();
        return Redirect()->route('quotes.index');
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
        $quote = Quotes::findOrFail($id);
        return view('admin.edit_quote')->with('quote',$quote);
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
        $quote =Quotes::findOrFail($id);
        $this->validate($request,[
          'title'=>'required|unique:quotes|max:255',
          'image'=>'required|mimes:jpg,png,bmp',
        ]);
        $quote->title = $request->input('title');

         $max = $quote->id;

         $imageName = '';


        if($request->file('image') ==null){
            $imageName = $quote->image;
        }
        else{
            File::delete('uploads/quotes/'.$quote->image);
            $imageName = $max.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/quotes',$imageName);
        }

        $quote->image = $imageName;
        $quote->save();
        return Redirect()->route('quotes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quotes::findOrFail($id);
         File::delete('uploads/quotes/'.$quote->image);
        $quote->delete();
        return redirect()->route('quotes.index');
    }
}
