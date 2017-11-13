<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;
use App\Media;
use App\Search;

class NewsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $news = new News();
      $news->title_en = $request->input('title');
      $news->description_en = $request->input('content');
      $news->type = 'news';
      $news->save();
      return Redirect()->route('output');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function newsDetails($id) {
      $words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
    	$news_details = DB::table('media')->where('type','news')->where('id',$id)->first();
        $news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
    	$final = $this->findSimilar($id);
      return view('news_details')->with(['word'=>$words,'news_details'=>$news_details,'final'=>$final,'news'=>$news]);
    }

    public function findSimilar($id) {
        //test start
        $needle = array();
        try{
            $needle = DB::table('media')->select('tags')->where('type','news')->where('id',$id)->first()->tags;
        }
        catch(Exception $e) {
            print($e);
            print_r('wrong');exit;
        }
        $needle = explode(',',$needle);
        $needle = array_filter($needle);
        $needle = array_values($needle);
        $count = DB::table('media')->where('type','news')->count();
        $items = array();
        for($i=0;$i<$count;$i++) {
            $stock = DB::table('media')->where('type','news')->select('id','tags')->get()[$i];
            $stock_tag = $stock->tags;
            $stock_tag = array_values(array_filter(explode(',',$stock_tag)));
            $similar_elements = array_intersect($needle,$stock_tag);
        $count_needle = count($needle);
        if($count_needle==0) {
          $count_needle = 1;
        }
        // print_r($stock);exit;
        $similar_items = (count($similar_elements)*100)/$count_needle;
    		$stock_id = $stock->id;
    		$items += array($stock_id => $similar_items);
    		arsort($items);
    	}
        if(sizeof($similar_elements)==0){
            return;
        }
    	$similarItemsKeys = array_keys($items);
        $final=array();
        for($i=0;$i<3;$i++) {
        $final[$i] = DB::table('media')->where('id',$similarItemsKeys[$i])->first();
        }
        //test end
        return $final;

    }
}
