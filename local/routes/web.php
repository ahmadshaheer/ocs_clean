<?php

use App\Quotes;
use App\User;
use App\Media;
use App\Video;
use App\Document;
use App\Bio;
use App\Album;
use App\InfoGraphic;
use App\Search;
use Intervention\Image\ImageManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['change_lang']],function(){

Route::get('/', function () {
	// print_r(Quotes::all());exit;
	$ids = Quotes::where('id','>',0)->pluck('id')->toArray();
	// print_r("here");exit;
	if(sizeof($ids)==0){
		$quotes = null;
		return view('index')->with('quotes',$quotes);
	}
	// print_r(Quotes::all());exit;
	$id = array_rand($ids,1);
	$db_id = $ids[$id];
	$quotes = Quotes::findOrFail($db_id);
	$language =  mb_detect_encoding($quotes->title);

    return view('index')->with(['quotes'=>$quotes,'language'=>$language]);
});

Route::get('advance_search',function() {
		$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
    $news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
  return view('advance_search')->with(['news'=>$news,'word'=>$words]);
})->name('advance_search');

Route::get('home',function() {

	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take('3')->get();
	$lattest_news = Search::take('4')->orderBy('id','desc')->get();
	$articles = DB::table('media')->where('type','article')->orderBy('id','desc')->take('6')->get();
	$videos = Video::take('2')->get();
	$documents = Document::take('5')->orderBy('id','desc')->get();
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
  return view('home')->with(['news'=>$news,'word'=>$words,'articles'=>$articles,'videos'=>$videos,'documents'=>$documents,'lattest_news'=>$lattest_news]);
})->name('home');

Route::get('test',function() {
	$news = DB::table('media')->where('type','news')->take('4')->get();
	$articles = DB::table('media')->where('type','article')->take('5')->get();
	$videos = Video::take('2')->get();
	$documents = Document::take('5')->get();
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	// print_r(DB::table('media'));exit;
  return view('test')->with(['news'=>$news,'word'=>$words,'articles'=>$articles,'videos'=>$videos,'documents'=>$documents]);
})->name('test');


Route::get('decrees',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$decrees = DB::table('president')->where('type','decree')->orderBy('id','desc')->paginate(3);
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('decrees')->with(['word'=>$words,'decrees'=>$decrees,'news'=>$news]);
})->name('decrees');

Route::get('decree_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$decree = DB::table('president')->where('type','decree')->where('id',$id)->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('decree_details')->with(['word'=>$words,'decree'=>$decree,'news'=>$news]);
})->name('decree_details');

Route::get('orders',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$orders = DB::table('president')->where('type','order')->orderBy('id','desc')->paginate(4);
	return view('orders')->with(['word'=>$words,'news'=>$news,'orders'=>$orders]);
})->name('orders');


Route::get('order_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$order = DB::table('president')->where('type','order')->where('id',$id)->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('order_details')->with(['word'=>$words,'news'=>$news,'order'=>$order]);
})->name('order_details');

Route::get('statements',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$statements = DB::table('president')->where('type','statement')->orderBy('id','desc')->paginate(4);
	return view('statements')->with(['word'=>$words,'news'=>$news,'statements'=>$statements]);
})->name('statements');

Route::get('statement_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$statement = DB::table('president')->where('type','statement')->where('id',$id)->first();
	return view('statement_details')->with(['word'=>$words,'news'=>$news,'statement'=>$statement]);
})->name('statement_details');

Route::get('messages',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$messages = DB::table('president')->where('type','message')->orderBy('id','desc')->paginate(4);
	return view('messages')->with(['word'=>$words,'news'=>$news,'messages'=>$messages]);
})->name('messages');

Route::get('message_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$message = DB::table('president')->where('type','message')->where('id',$id)->first();
	return view('message_details')->with(['word'=>$words,'news'=>$news,'message'=>$message]);
})->name('message_details');

Route::get('words',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$words_all = DB::table('president')->where('type','word')->orderBy('id','desc')->paginate(4);
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('words')->with(['word'=>$words,'news'=>$news,'words_all'=>$words_all]);
})->name('words');

Route::get('word_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->where('id',$id)->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$word_details = DB::table('president')->where('type','word')->where('id',$id)->first();
	return view('word_details')->with(['word'=>$words,'news'=>$news,'word_details'=>$word_details]);
})->name('word_details');

Route::get('domestic_trips',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$domestic= DB::table('trips')->where('type','domestic')->orderBy('id','desc')->paginate(4);
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('domestic_trips')->with(['word'=>$words,'news'=>$news,'domestic'=>$domestic]);
})->name('domestic_trips');

Route::get('domestic_details/{id}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$domestic_trip = DB::table('trips')->where('type','domestic')->where('id',$id)->first();
	return view('domestic_trip_details')->with(['word'=>$words,'news'=>$news,'domestic_trip'=>$domestic_trip]);
})->name('domestic_details');

Route::get('international_trips',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$international = DB::table('trips')->where('type','international')->orderBy('id','desc')->paginate(4);
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();

	return view('international_trips')->with(['word'=>$words,'news'=>$news,'international'=>$international]);
})->name('international_trips');

Route::get('international_trip_details/{id}',function($id){
	$word = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$international_details = DB::table('trips')->where('type','international')->where('id',$id)->first();
	return view('international_trip_details')->with(['word'=>$word,'news'=>$news,'international_details'=>$international_details]);
})->name('international_trip_details');

Route::get('news',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->paginate(4);
	return view('news')->with(['word'=>$words,'news'=>$news]);
})->name('news');

Route::get('articles',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->paginate(4);
	$articles = DB::table('media')->where('type','article')->orderBy('id','desc')->paginate(4);
	return view('articles')->with(['word'=>$words,'news'=>$news,'articles'=>$articles]);
})->name('articles');

Route::get('article_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$article_details = DB::table('media')->where('type','article')->where('id',$id)->first();
	return view('article_details')->with(['word'=>$words,'news'=>$news,'article_details'=>$article_details]);
})->name('article_details');

Route::get('documents',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$documents = DB::table('documents')->orderBy('id','desc')->paginate(4);
	return view('documents')->with(['word'=>$words,'news'=>$news,'documents'=>$documents]);
})->name('documents');

Route::get('videos',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$videos = DB::table('videos')->orderBy('id','desc')->paginate(4);
	return view('videos')->with(['word'=>$words,'news'=>$news,'videos'=>$videos]);
})->name('videos');

Route::get('video_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$video = Video::findOrFail($id);
	return view('video_details')->with(['word'=>$words,'news'=>$news,'video'=>$video]);
})->name('video_details');

Route::get('trips',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$trips = DB::table('trips')->orderBy('id','desc')->paginate(4);
	return view('trips')->with(['word'=>$words,'news'=>$news,'trips'=>$trips]);
})->name('trips');

Route::get('biography',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$biography = DB::table('biography')->orderBy('id','desc')->first();
	return view('biography')->with(['word'=>$words,'news'=>$news,'biography'=>$biography]);
})->name('biography');

Route::get('infographics',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$info = InfoGraphic::paginate(6);
	// print_r($info);exit;
	return view('infographics')->with(['word'=>$words,'news'=>$news,'info'=>$info]);
})->name('infographics');

Route::get('infographic_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$info = InfoGraphic::findOrFail($id);
	return view('infographic_details')->with(['word'=>$words,'news'=>$news,'info_details'=>$info]);
})->name('infographic_details');

Route::get('photo_albums',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$albums = Album::paginate(8);
	return view('albums')->with(['word'=>$words,'news'=>$news,'albums'=>$albums]);
})->name('photo_albums');

// test start

	Route::get('test_image',function() {
		$img = Image::make(asset('assets/img/logo.png'));
    $test = new imageManager(array('driver'=>'imagick'));
    echo "<pre>";
    print_r($img);
    echo "</pre>";
	})->name('test_image');
// test end

Route::get('ocs',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$ocs = DB::table('ocs')->orderBy('id','desc')->first();
	return view('ocs')->with(['word'=>$words,'news'=>$news,'ocs'=>$ocs]);
})->name('ocs');

Route::get('chief_of_staff',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$cos = DB::table('chief')->orderBy('id','desc')->first();
	return view('chief_of_staff')->with(['word'=>$words,'news'=>$news,'cos'=>$cos]);
})->name('chief_of_staff');

Route::get('organizational_structure',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('organizational_structure')->with(['word'=>$words,'news'=>$news]);
})->name('organizational_structure');

Route::get('presidential_palace',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$palace = DB::table('presidential_palace')->orderBy('id','desc')->first();
	return view('presidential_palace')->with(['word'=>$words,'news'=>$news,'palace'=>$palace]);
})->name('presidential_palace');

Route::get('register_complaint',function() {
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('register_complaint')->with(['word'=>$words,'news'=>$news]);
})->name('register_complaint');

Route::post('store_media_form','MediaRegisterationController@store_media_form')->name('store_media_form');
Route::post('store_journalist_form','MediaRegisterationController@store_journalist_form')->name('store_journalist_form');
Route::post('store_expert_form','MediaRegisterationController@store_expert_form')->name('store_expert_form');

Route::get('media_directorate',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$media = DB::table('media_directorate')->first();
	return view('media_directorate')->with(['word'=>$words,'news'=>$news,'media'=>$media]);
})->name('media_directorate');

Route::get('media_form',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('media_form')->with(['word'=>$words,'news'=>$news]);
})->name('media_form');

Route::get('journalist_form',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('journalist_form')->with(['word'=>$words,'news'=>$news]);
})->name('journalist_form');

Route::get('expert_form',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	return view('expert_form')->with(['word'=>$words,'news'=>$news]);
})->name('expert_form');

Route::get('links',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$links = DB::table('links')->orderBy('id','desc')->paginate(4);
	return view('links')->with(['word'=>$words,'news'=>$news,'links'=>$links]);
})->name('links');

Route::get('albums',function(){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$albums = Album::paginate(8);
	return view('albums')->with(['word'=>$words,'news'=>$news,'albums'=>$albums]);
})->name('albums');

Route::get('album_details/{id?}',function($id){
	$words = DB::table('president')->where('type','word')->orderBy('id','desc')->first();
	$news = DB::table('media')->where('type','news')->orderBy('id','desc')->take(5)->get();
	$album_images = DB::table('album_image')->where('album_id',$id)->get();
	return view('album_images')->with(['word'=>$words,'news'=>$news,'images'=>$album_images]);
})->name('album_images');

//Rss Generator Starts

Route::get('feed', function(){

    // create new feed
    $feed = App::make("feed");

    // multiple feeds are supported
    // if you are using caching you should set different cache keys for your feeds

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(1, 'laravelFeedKey');

    // check if there is cached feed and build new only if is not
    if (!$feed->isCached())
    {
       // creating rss feed with our most recent 20 posts
       $posts = \DB::table('search_table')->get();
      //  print_r($posts);exit;

       // set your feed's title, description, link, pubdate and language
       $feed->title = 'OCS';
       $feed->description = 'Office of Chief of Staff ';
       $feed->logo = 'http://yoursite.tld/logo.jpg';
       $feed->link = url('feed');
       $feed->setDateFormat('d M Y'); // 'datetime', 'timestamp' or 'carbon'
       $feed->pubdate = $posts[0]->date_en;
       $feed->lang = 'en';
       $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

			 $lang = Config::get('app.locale');
			 $title = 'title_'.$lang;
			 $date = 'date_'.$lang;
			 $short_desc = 'short_desc_'.$lang;
			 $description = 'description_'.$lang;
       foreach ($posts as $post)
       {
				 		if($post->type!=false) {
							$url = $post->type."_details/".$post->table_id;
							// set item's title, author, url, pubdate, description, content, enclosure (optional)*
							$feed->add($post->$title,'shaheer', URL::to($url), $post->$date, $post->$short_desc, $post->$description);
						}
       }

    }

    // first param is the feed format
    // optional: second param is cache duration (value of 0 turns off caching)
    // optional: you can set custom cache key with 3rd param as string
    return $feed->render('atom');

    // to return your feed as a string set second param to -1
    // $xml = $feed->render('atom', -1);

});
//Rss Generator Ends


Route::get('news_details/{id?}','NewsController@newsDetails')->name('news_details');

// Route::post('/language-chooser','LanguageController@changeLanguage');

Route::get('search_result','SearchController@search_result')->name('search_result');
Route::post('get_search',['uses'=>'SearchController@get_search','before'=>'csrf'])->name('get_search');

Route::get('language',[
	'before' => 'csrf',
	'as'	 => 'language-chooser',
	'uses'	 => 'LanguageController@changeLanguage',

	 ]);
});


// Admin Routes Starts

Route::group(['middleware'=>['chk_usr']],function(){


	Route::get('admin',function(){
		return view('admin.index');
	})->name('admin');

	// Resource Controllers
	Route::resource('admin/documents','DocumentsController');
	Route::resource('admin/videos','VideoController');
	Route::resource('admin/quotes','QuotesController');
	Route::resource('admin/infographic','InfoGraphicController');
	Route::resource('admin/album','AlbumController');
	Route::resource('admin/the_president','PresidentController');
	Route::resource('admin/the_bio','BioController');
	Route::resource('admin/the_ocs','OCSController');
	Route::resource('admin/the_chief','ChiefController');
	Route::resource('admin/links','LinksController');
	Route::resource('admin/the_palace','Presidential_PalaceController');
	Route::resource('admin/media_directorate','MediaDirectorateController');
	Route::resource('admin/trips','TripController');
	Route::resource('admin/media','MediaController');


	// Album Routes

	Route::get('admin/album/album_image/{number?}/{id?}','AlbumController@add_album_image')->name('add_album_image');
	Route::post('admin/album/image/{id?}/{number?}','AlbumController@add_image')->name('add_image');
	Route::get('admin/view_album_images/{id?}','AlbumController@view_album_images')->name('view_album_images');
	Route::get('admin/edit_images/{id?}','AlbumController@edit_images')->name('edit_images');
	Route::get('admin/edit_album_image/{id?}','AlbumController@edit_album_image')->name('edit_album_image');
	Route::any('admin/update_album_image/{id?}','AlbumController@update_album_image')->name('update_album_image');
	Route::any('admin/delete_album_image/{id?}/{album_id?}','AlbumController@delete_album_image')->name('delete_album_image');

	// About the President Routes Starts

	Route::get('admin/decrees','PresidentController@decrees')->name('admin_decree');
	Route::get('admin/orders','PresidentController@orders')->name('admin_order');
	Route::get('admin/statements','PresidentController@statements')->name('admin_statement');
	Route::get('admin/messages','PresidentController@messages')->name('admin_message');
	Route::get('admin/complaints','ComplaintsController@view')->name('view_complaints');
	Route::delete('admin/destroy_complaint/{id}','ComplaintsController@destroy')->name('destroy_complaint');
	Route::get('admin/words','PresidentController@words')->name('admin_word');

	// About the Trips Routes Starts

	Route::get('admin/domestic','TripController@domestic')->name('admin_domestic');
	Route::get('admin/international','TripController@international')->name('admin_international');

	// Media Routes Starts


	Route::get('admin/news','MediaController@news')->name('admin_news');
	Route::get('admin/articles','MediaController@articles')->name('admin_article');

	// Auth Routes


	Route::get('register','Auth\RegisterController@show_register')->name('register_user');
	Route::post('register','Auth\RegisterController@register')->name('register');

	Route::get('admin/users',function(){
		$users = User::all();
		return view('admin.users')->with('users',$users);
	})->name('users');

	Route::delete('delete_user/{id?}','Auth\LoginController@destroy')->name('delete_user');
	Route::get('edit_user/{id?}','Auth\LoginController@edit_user')->name('edit_user');
	Route::any('update_user/{id?}','Auth\LoginController@update_user')->name('update_user');
	Route::get('logout','Auth\LoginController@logout')->name('logout');

	// Form Registered Route

	Route::get('admin/view_media_register','MediaRegisterationController@view_media')->name('view_media_register');
	Route::get('admin/view_journalist_register','MediaRegisterationController@view_journalist')->name('view_journalist_register');
	Route::get('admin/view_expert_register','MediaRegisterationController@view_expert')->name('view_expert_register');


Route::get('admin/set_session_all',function(){
			$lang = $_GET['lang'];
			$route = $_GET['route'];
			Session::put('lang',$lang);
			return Redirect($route);
	});

	Route::get('admin/set_session',function(){
			$session = $_GET['lang'];
			$parts = explode('_', $session);
			$type = $parts[1];
			$lang = $parts[0];
			$route = $_GET['route'];
			Session::put('lang',$lang);
			Session::put('type',$type);
			return Redirect($route);
	});
	Route::get('admin/edit_session',function(){
			$lang = $_GET['lang'];
			$route = $_GET['route'];
			Session::put('lang',$lang);
			return Redirect($route);
	});
		Route::get('admin/set_session_for_view',function(){
			$session = $_GET['lang'];
			Session::put('view_lang',$session);
			return back();
	});
});


// Login Routes start

	Route::get('login',function(){
		return view('auth.login');
	})->name('login');

	Route::post('login_user','Auth\LoginController@login')->name('check_crediential');

	Route::get('forgot','Auth\ResetPasswordController@forgot')->name('forgot');
	Route::post('send_reset_link','Auth\ResetPasswordController@send_reset_link')->name('send_reset_link');
	Route::get('show_reset_form/{email?}','Auth\ResetPasswordController@show_reset_form')->name('show_reset_form');
	Route::post('reset_password','Auth\ResetPasswordController@reset_password')->name('reset_password');

// Login Routes Ends
	// Route::get('test',function(){
	// 	return view('test');
	// });
