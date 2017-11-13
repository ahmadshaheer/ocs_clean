@php
  global $lang;
  global $dir;
  global $indir;
  global $ltr;
  global $rtl;
  global $title;
  global $date;
  global $short_desc;
  global $description;
  global $url;
  global $jdate;

  use App\Http\Controllers\DateChanger;
  $jdate = new DateChanger();
  $lang = Config::get('app.locale');
  $dir = ($lang!='en')?'right':'left';
  $indir = ($lang!='en')?'left':'right';
  $ltr = ($lang!='en')?'ltr':'rtl';
  $rtl = ($lang!='en')?'rtl':'ltr';
  //variables for loading data from db
  $title='title_'.$lang;
  $date = 'date_'.$lang;
  $url = 'url_'.$lang;
  $short_desc = 'short_desc_'.$lang;
  $description = 'description_'.$lang;
@endphp

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OCS</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/pagination.css')}}">
  <!-- calendar -->
<link rel="stylesheet" href="{{asset('assets/admin-asset/css/persian-datepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin-asset/css/monthly.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icon.min.css')}}">

<!-- //calendar -->
  <style>
  body * {
    direction:{{$ltr}};
    text-align:{{$dir}};
    text-transform: none;
  }
  ul li {
    direction: {{$rtl}} !important;
  }
  @font-face {
    font-family: 'aop_font';
    src:url("{{asset('assets/fonts/aop_font.ttf')}}");
  }
  @font-face {
    font-family: 'pashto nazo';
    src:url("{{asset('assets/fonts/pashto_nazo.ttf')}}");
  }
  #top_bar {
    background:#0f4682;
    /*height: fit-content;
    max-height: 95px !important;*/
    max-height:109px !important;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    left: 0;
    right: 0;
    padding-top: 22px;
    height:90px;
  }
  .social_buttons {
    position: absolute;
    left: 0;
    bottom: 20%;
  }
  #menu_bar {
    /*padding:0 14px;*/
    /*padding: 18px 14px;*/
    background-color:#3274b9;
    /*padding:6px;*/
    /*margin-bottom:14px;*/
  }
  #menu_bar .item {
    font-size: 1.1em;
    font-weight: bold;
    text-align:{{$dir}};
    /*color:white !important;*/
  }
  blockquote {
    border:0;
    border-{{$dir}}: 4px solid #3274b9;
    padding-{{$dir}}: 1em;
    margin-right:0;
    margin-{{$dir}}:20px;
  }
  .test {
    padding-{{$dir}}: .5em;
    border-bottom: 3px solid #3274b9;
    font-size: 1.2em;
    line-height: 1.5em;
    text-transform: none;
  }
  .title_font,h1,h2,h3,h4,h5,h6 {
    @if ($lang=='pa')
      font-family:pashto nazo !important;
      font-size:1.3em !important;
    @else
      font-family: aop_font !important;
      font-size:1.3em !important;
    @endif
    font-weight: bold !important;

    text-align:{{$dir}};
    direction:{{$rtl}};
  }
  .slider-nav {
    bottom:0;
    width:auto !important;
  }
  .slider-nav__item {
    background:#999;
  }
  .slider-nav__item--current {
    background:#5f5e9a;
  }
  .ui.card {
    border:0 !important;
    box-shadow: none !important;
  }
  .ui.segment{
    border-radius:0 !important;
    box-shadow:none !important;
    border-bottom:1px solid #ddd !important;
    margin-bottom:0;
    margin:0;
  }
  .latest_articles {
    border-bottom:1px dashed #ddd;
    padding-bottom:25px;
    padding-top:5px;
  }
  .body_font,p,a,span,label {
    font-family:aop_font !important;
    text-align: {{$dir}};
    direction:{{$rtl}};
    color:black;
    line-height: 2;
  }
  span {
    color : #666 !important;
  }
  .description ul {
    padding-{{$dir}}:15px !important;
  }
  .social_boxes {
    border:0 !important;
    border-radius:0 !important;
    height:150px;
  }
  .ui.horizontal.celled.list .list>.item, .ui.horizontal.celled.list>.item {
    border-left:1px solid #fff;
  }
  #test {
    display:none;
    background-color:#5f5e9a;
    border:0;
    border-radius: 0;
    height:fit-content;
  }
  #footer_social_buttons {
    position:absolute;
    {{$dir}}:0;
    bottom:20%;
  }
  #mobile_only {
    display:none;
  }
  #language {
    display:none;
  }
  .ui.secondary.menu .dropdown.item>.menu, .ui.text.menu .dropdown.item>.menu {
    border-radius: 0;
  }
  #social_segment,#social_segment .ui.grid .ui.fluid.card {
    /*background-color:#f7f7f7;*/
  }
  .ui.menu .ui.dropdown.item .menu .item:not(.filtered) {
    border-bottom:1px solid #ddd;
  }
  #mobile_menu{
    display:none;
    background-color: #5f5e9a;
    padding:0;
  }
  .accordion {
    margin-top: 0 !important;
  }
  #mobile_menu .title {
    padding:10px;
  }
  .accordion .menu, .accordion .item {
    background-color: #7d7cb9 !important;
    border:0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
  }
  @media screen and (max-width:990px) {
    #mobile_menu {
      display:block;
      position: fixed;
      left: 0;
      right: 0;
      z-index: 2;
      border: 0 !important;
    }
    #logo_img {
      width: 65%;
      margin-right:10px;
    }
    #main {
      padding-top:60px;
    }
    #top_bar {
      display: none;
    }
    #footer_social_buttons {
      margin-left:47%;
      right:auto;
    }
    #footer_social_first_button {
      margin-left: -55%;
    }
    #menu_bar {
      display:none;
    }
    .ui.fixed.menu {
      display: none !important;
    }
    #main{
      display: flex;
    }
    #main .sixteen.wide.tablet.mobile.four.wide.computer.column{
      order: 2;
    }
    #main .sixteen.wide.tablet.mobile.tweleve.wide.computer.column{
      order: 1;
    }
    .owl-carousel {
      margin-top:60px;
    }
    #carousel_image_div img {
      width:100% !important;
      margin:0 !important;
    }
    blockquote {
      margin-left:0;
    }

  }
  @media only screen and (max-width: 1000px) and (min-width: 510px){
      #logo_img{
          width: 40% !important;
          padding-{{$indir}} : 15px !important;
          padding-top: 8px;
      }
  }
  @media screen and (max-width:450px) {
    #logo_img{
      padding-top: 12px;
      padding-{{$dir}} : 5px !important;
    }
    .fb{
      padding-{{$dir}}:0px !important;
    }
    #footer_social_first_button {
      margin-left: -8.5em !important;
    }
    .ui.fixed.menu {
      display: none !important;
    }
    .carousel_image_div img {
      height: 50% !important;
    }
  }
  .ui.fixed.menu {
    display: none;
  }
  .languageSwitcher {
    text-align: center;
  }
  hr {
    border-color: #ddd;
    border-width: .5px;
  }
  .ui.fluid.card .content{
    padding-{{$dir}}:5px !important;
  }
  .ui.fluid.card {
    border:1px solid #ddd !important;
    border-radius:0 !important;
    margin-top:15px;
    padding:14px !important;
  }
  .no_border {
    border:0 !important;
  }
  .main_menu_dropdown {
    {{$dir}}:0 !important;
    {{$indir}}:auto !important;
    width:280px;
  }
  .main_menu_dropdown .item {
    color:black !important;
  }
  .ui.three.column.container.stackable.grid * {
      color:white !important;
  }
  .second_level_dropdown {
    {{$dir}}:103% !important;
    top:-1 !important;
  }
  .second_level_dropdown .item{
    width: 100%;
  }
  .ui.items>.item>.image {
    padding-top:10px !important;
  }
  /*thumbnail image center and crop style starts*/
  .thumbnail {
    position: relative;
    width: 100px;
    height: 70px;
    overflow: hidden;
    top:3px;
  }
  .thumbnail img {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 100%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
  }
  .thumbnail img.portrait {
    width: 100%;
    height: auto;
  }
  /*thumbnail image center and crop style ends*/
  .ui.items>.item>.content>.header {
    margin-top:0;
    font-size:13px;
  }
  .ui.items>.item>.content {
    width:95%;
    padding-{{$dir}}:10px !important;
  }
  .short_desc {
    direction: {{$rtl}};
    text-align:{{$dir}};

  }
  .carousel_image_div {
    position: relative;
    width: 100px;
    height: 25em;
    overflow: hidden;
  }
  .carousel_image_div img {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 100%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
  }
  .ui.card>.content>.header:not(.ui), .ui.cards>.card>.content>.header:not(.ui) {
    font-size:1.5em;
  }
  .no_borders {
    border:0 !important;
  }
  h4.ui.header {
    font-size:1.07em !important;
    color:black !important;
  }
  h3.ui.header {
    color:black !important;
    font-size:1.13em !important;
  }
  .ui[class*="right floated"].header {
    color: black !important;
  }
  .ui.card>.content>.header:not(.ui), .ui.cards>.card>.content>.header:not(.ui) {
    font-size: 1.5em !important;
  }

  #en,#dr,#pa {
    font-family: aop_font !important;
  }
  input {
    border-radius:0 !important;
    box-shadow: none;
    border:0;
  }
  #mobile_top_bar {
    padding-top: 20px !important;
    width: 50px;
  }
  #mobile_top_bar img {
    position: absolute;
    top:0;
    {{$dir}}:0;
    height: 60px;
  }
  .ui.inverted.accordion {
    direction:{{$ltr}};
  }
  .search {
    position: absolute;
    {{$indir}}: 0px;
    top: 9px;
  }
  input {
    text-align: {{$dir}} !important;
  }
  .ui.small.top.fixed.inverted.menu .logo {
    position: relative;
    height: 50px;
    width: 25em;
    background-color:
  }
  .ui.small.top.fixed.inverted.menu img {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 100%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
  }
  .ui.small.top.fixed.menu .item {
    font-size:1.09em;
  }
  .ui.small.top.fixed.menu {
    background-color:#3274b9;
    box-shadow: -1px 2px 20px 0px #353535;
  }
  .ui.small.top.fixed.menu #dr,#fixed_home {
    {{($lang=='en')?"border-left:.5px solid #427fbe;":""}}
  }
  .ui.menu .ui.dropdown.item .menu .item:not(.filtered) {
    text-align: {{$dir}};
  }
  #mobile_menu .search {
    position: absolute;
    {{$indir}}: 21px;
    top:10px;
    color: white;
    font-size: 20px !important;
  }
  #mobile_menu .language {
    position: absolute;
    {{$indir}}: 67px;
    top:21px;
    color: white;
    font-size: 20px !important;
    padding-{{$indir}}:5px;
  }
  .ui.centered.container.grid {
    padding:0 1.8em;
  }
  .ui.header.title_font.border{
    border-bottom: 3px solid #5f5e9a;padding-bottom: 2px;
  }
  .sixteen.wide.tablet.mobile.twelve.wide.computer.column .ui.items{
    margin-top: 2px !important;
  }
  .ui.active.button {
    float: left;
    border-radius: 0;
    height: 38px;
    padding:14px !important;
  }
  .lb-closeContainer {
    display: none;
  }
  .lb-data {
    padding:0 !important;
  }
  .lb-data .lb-details {
    width: 100% !important;
  }
  .lb-details {
    display: inline-block;
    line-height: 1;
    vertical-align: baseline;
    background-color: #e8e8e8;
    background-image: none;
    padding: .5833em .833em;
    color: rgba(0,0,0,.6);
    text-transform: none;
    font-weight: 700;
    border: 0 solid transparent;
    border-radius: .28571429rem;
  }
  .lb-number {
    float: right;
  }
  @if($lang!='en')
    #carousel_div {
      display: flex;

    }
    #carousel_image_div {
      order:1;
    }
    #carousel_text_div {
      order:2;
    }
  @endif
  .owl-dots {
    display: flex;
    justify-content: center;
  }
  .owl-carousel .owl-dot, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-nav .owl-prev {
    background: none repeat scroll 0 0 #869791;
    border-radius: 20px;
    display: inline-flex;
    height: 12px;
    margin: 5px 7px;
    opacity: 0.5;
    width: 12px;
  }
  .owl-dot.active {
    background-color: #0800ff;
  }

  #carousel_image_div img {
    width:88%;
    padding-bottom:5%;
    float: {{$dir}};
    margin-{{$dir}}: 55px;
  }
  @media (min-width:990px) {
    .carousel_thumbnail {
      position: relative;
      width: 100%;
      height: 25vh;
      overflow: hidden;
      top: 3px;
    }

    .carousel_thumbnail img {
      position: absolute;
      left: 48%;
      top: 50%;
      height: 100%;
      width: auto;
      -webkit-transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
      transform: translate(-50%,-50%);
    }
  }

  </style>
</head>
<body style="background-color:#f4f4f4;">

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

{{-- top bar starts --}}
<div id="top_bar">
  <div class="ui computer only stackable container grid" style="{{($lang!='en')?'padding:0 18px;':''}}">
    <div class="ui two column row" style="margin-bottom:0;padding:0 6px;">
      <div class="column" style="padding-left:0;">
        <div class="ui grid">
          <div class="six wide column" id="arg">
            <img class="ui small image" src="{{asset('assets/img/arg.png')}}" alt="">
          </div>
          <div class="eight wide column" id="social">
            <div class="social_buttons">
              <div class="ui tiny circular inverted basic icon button">
                <i class="icon facebook f"></i>
              </div>
              <div class="ui tiny circular inverted basic icon button">
                <i class="icon twitter"></i>
              </div>
              <div class="ui tiny circular inverted basic icon button">
                <i class="icon instagram"></i>
              </div>
              <div class="ui tiny circular inverted basic icon button">
                <i class="icon youtube"></i>
              </div>
              <div class="ui tiny circular inverted basic icon button">
                <i class="icon rss"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="column" style="padding-right:0;">
        <div class="ui grid">
          <div class="sixteen wide column" id="logo">
          <a href="{{route('home')}}">
            <img style="float:{{$dir}};" src="{{asset('assets/img/logo_'.$lang.'.png')}}" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- top bar ends --}}

  {{-- hidden menu starts --}}
  <div class="ui small top fixed inverted hidden menu" style="border:0;">
    <div class="ui container" style="direction:{{$rtl}};padding-left:18px;padding-right:18px;">
      <a href="{{route('home')}}" class="logo">
        <img src="{{asset('assets/img/logo_'.$lang.'.png')}}" alt="">
      </a>
      <a href="{{route('home')}}" id="fixed_home" class="item body_font">{{trans('menu.home')}}</a>
      <div class="ui dropdown link item body_font" style="">
        {{trans('menu.the_president')}}
        <div class="ui menu inverted main_menu_dropdown">
          <a href="{{route('decrees')}}" class="item body_font">{{trans('menu.decrees')}}</a>
          <a href="{{route('orders')}}" class="item body_font">{{trans('menu.orders')}}</a>
          <a href="{{route('statements')}}" class="item body_font">{{trans('menu.statements')}}</a>
          <a href="{{route('messages')}}" class="item body_font">{{trans('menu.messages')}}</a>
          <a href="{{route('words')}}" class="item body_font">{{trans('menu.words')}}</a>
          <a href="{{route('trips')}}" class="item body_font">{{trans('menu.trips')}}</a>
          <a href="{{route('biography')}}" class="item body_font">{{trans('menu.biography')}}</a>
        </div>
      </div>
      <div class="ui dropdown link item body_font">
        {{trans('menu.media')}}
        <div class="ui menu inverted  main_menu_dropdown">
          <a href="{{route('news')}}" class="item body_font">{{trans('menu.news')}}</a>
          <a href="{{route('articles')}}" class="item body_font">{{trans('menu.articles')}}</a>
          <a href="{{route('infographics')}}" class="item body_font">{{trans('menu.infographics')}}</a>
          <a href="{{route('documents')}}" class="item body_font">{{trans('menu.reports_and_documents')}}</a>
          <a href="{{route('photo_albums')}}" class="item body_font">{{trans('menu.photo_albums')}}/a>
          <a href="{{route('videos')}}" class="item body_font">{{trans('menu.videos')}}</a>
          <a href="{{route('links')}}" class="item body_font">{{trans('menu.links')}}</a>
        </div>
      </div>
      <div class="ui dropdown link item body_font">
        {{trans('menu.about_us')}}
        <div class="ui menu inverted main_menu_dropdown" style="left:auto !important;">
          <a href="{{route('ocs')}}" class="item body_font">{{trans('menu.ocs')}}</a>
          <a href="{{route('chief_of_staff')}}" class="item body_font">{{trans('menu.chief_of_staff')}}</a>
          <a href="{{route('organizational_structure')}}" class="item body_font">{{trans('menu.organizational_structure')}}</a>
          <a href="{{route('presidential_palace')}}" class="item body_font">{{trans('menu.presidential_palace')}}</a>
        </div>
      </div>
      <div class="ui dropdown link item body_font" id="fixed_contact">
        {{trans('menu.contact_us')}}
        <div class="ui menu inverted main_menu_dropdown">
          <a href="{{route('register_complaint')}}" class="item body_font">{{trans('menu.complaint_regestration')}}</a>
          <a href="{{route('media_directorate')}}" class="item body_font">{{trans('menu.media_directorate')}}</a>
           <div class="item body_font " >
              {{trans('menu.subscription')}}
              <div class="menu second_level_dropdown" style="border-radius: 0 !important;">
                <a href="{{route('media_form')}}" class="item">
                  {{trans('menu.media_form')}}
                </a>
                <a href="{{route('journalist_form')}}" class="item">
                  {{trans('menu.journalist_form')}}
                </a>
                <a href="{{route('expert_form')}}" class="item">
                  {{trans('menu.expert_form')}}
                </a>
              </div>
            </div>
        </div>

      </div>

      <a class="languageSwitcher {{$indir}} item body_font" style="" id="pa">پشتو</a>
      <a class="languageSwitcher item body_font" style="" id="dr">دری</a>
      <a class="languageSwitcher item body_font" id="en" style="">English</a>
    </div>
  </div>
  {{-- hidden menu starts --}}


  {{--  menu bar starts --}}
    <div id="menu_bar" style="">
      <div id="" class="ui pointing secondary inverted container menu" style="border:0;direction:{{$rtl}};padding-{{$indir}}:12px;">
        <a href="{{route('home')}}" class="item body_font">{{trans('menu.home')}}</a>
        <div class="ui dropdown link item body_font" style="">
          {{trans('menu.the_president')}}
          <div class="ui menu inverted main_menu_dropdown">
            <a href="{{route('decrees')}}" class="item body_font">{{trans('menu.decrees')}}</a>
            <a href="{{route('orders')}}" class="item body_font">{{trans('menu.orders')}}</a>
            <a href="{{route('statements')}}" class="item body_font">{{trans('menu.statements')}}</a>
            <a href="{{route('messages')}}" class="item body_font">{{trans('menu.messages')}}</a>
            <a href="{{route('words')}}" class="item body_font">{{trans('menu.words')}}</a>
            <div class="item body_font " >
              {{trans('menu.trips')}}
              <div class="menu second_level_dropdown" style="border-radius: 0 !important;">
                <a href="{{route('international_trips')}}" class="item">
                  {{trans('menu.international_trips')}}
                </a>
                <a href="{{route('domestic_trips')}}" class="item">
                  {{trans('menu.domestic_trips')}}
                </a>
              </div>

            </div>
            <a href="{{route('biography')}}" class="item body_font">{{trans('menu.biography')}}</a>
          </div>
        </div>
        <div class="ui dropdown link item body_font">
          {{trans('menu.media')}}
          <div class="ui menu inverted main_menu_dropdown">
            <a href="{{route('news')}}" class="item body_font">{{trans('menu.news')}}</a>
            <a href="{{route('articles')}}" class="item body_font">{{trans('menu.articles')}}</a>
            <a href="{{route('infographics')}}" class="item body_font">{{trans('menu.infographics')}}</a>
            <a href="{{route('documents')}}" class="item body_font">{{trans('menu.reports_and_documents')}}</a>
            <a href="{{route('photo_albums')}}" class="item body_font">{{trans('menu.photo_albums')}}</a>
            <a href="{{route('videos')}}" class="item body_font">{{trans('menu.videos')}}</a>
            <a href="{{route('links')}}" class="item body_font">{{trans('menu.links')}}</a>
          </div>
        </div>
        <div class="ui dropdown link item body_font">
          {{trans('menu.about_us')}}
          <div class="ui menu inverted main_menu_dropdown" style="left:auto !important;">
            <a href="{{route('ocs')}}" class="item body_font">{{trans('menu.ocs')}}</a>
            <a href="{{route('chief_of_staff')}}" class="item body_font">{{trans('menu.chief_of_staff')}}</a>
            <a href="{{route('organizational_structure')}}" class="item body_font">{{trans('menu.organizational_structure')}}</a>
            <a href="{{route('presidential_palace')}}" class="item body_font">{{trans('menu.presidential_palace')}}</a>
          </div>
        </div>
        <div class="ui dropdown link item body_font">
          {{trans('menu.contact_us')}}
          <div class="ui menu inverted main_menu_dropdown">
            <a href="{{route('register_complaint')}}" class="item body_font">{{trans('menu.complaint_regestration')}}</a>
            <a href="{{route('media_directorate')}}" class="item body_font">{{trans('menu.media_directorate')}}</a>
            <div class="item body_font " >
              {{trans('menu.subscription')}}
              <div class="menu second_level_dropdown left" style="border-radius: 0 !important;">
                <a href="{{route('media_form')}}" class="item">
                  {{trans('menu.media_form')}}
                </a>
                <a href="{{route('journalist_form')}}" class="item">
                  {{trans('menu.journalist_form')}}
                </a>
                <a href="{{route('expert_form')}}" class="item">
                  {{trans('menu.expert_form')}}
                </a>
              </div>
            </div>
          </div>
        </div>
        <a class="item" id="search">
          <i class="icon search" style="position:relative;top:1px;left:0;  "></i>
        </a>
        <a id="pa" class="languageSwitcher {{$indir}} item" style="">پشتو</a>
        <a id="dr" class="languageSwitcher item" style="">دری</a>
        <a id="en" class="languageSwitcher item" style="">English</a>

        <a class="item" id="language">
          <i class="icon globe"></i>
        </a>
        <a class="right item" id="mobile_only">
          <i class="icon sidebar"></i>
        </a>
      </div>
    </div>
  {{-- menu bar ends --}}
  {{-- computer search box starts --}}
  <div class="ui grid" id="search_box" style="padding-bottom:0px;display:none;">
    <div class="column" style="background-color:#0f4782;padding-bottom:0;margin-top:14px;">
      <div class="ui container" style="width:57%;padding-left:10px;">
        <form class="ui form" action="{{url('search')}}" name="search_form">
          <div class="field" style="display: inline;float: left;width: 76%">
            <div class="ui icon input">
              <input class="prompt body_font" style="direction:ltr;" name="search" id="search_text" type="text" placeholder="{{trans('home.search')}}">
              <i class="search icon"></i>
            </div>
          </div>
          <a class="ui active button" href="{{route('advance_search')}}" target="_blank" style="margin-left:10px;">
                {{trans('menu.advanced_search')}}
              </a>
        </form>
      </div>
    </div>
  </div>
  {{-- computer search box ends --}}




  {{-- mobile menu starts --}}
  <div class="ui inverted segment" id="mobile_menu">
    <div class="ui inverted accordion" style="text-align:{{$dir}};">
      <img src="{{asset('assets/img/logo_'.$lang.'.png')}}" alt="" style="" id="logo_img">
      <a href="#" class="search" id="mobile_search">
        <i class="icon search" style="font-size:2em;top:0;"></i>
      </a>

      <div class="language" id="mobile_lang">
        <div class="ui floating dropdown icon" id="lang-menu" style="border-radius:0" tabindex="0">
          <i class="icon globe"></i>
          <div class="menu" id="language" tabindex="-1">
            <a href="javascript:void(0)" class="item body_font languageSwitcher" id="en" style="">English</a>
            <a href="javascript:void(0)" class="item body_font languageSwitcher" id="dr" style="text-align:right;font-family:b_mitra;">دری</a>
            <a href="javascript:void(0)" class="item body_font languageSwitcher" style="text-align:right;font-family:pashto_nazo;" id="pa">پښتو</a>
          </div>
        </div>
      </div>
      <div class="title" id="mobile_top_bar" style="position: absolute;top: 1px;">
        <i style="font-size:1.5em;" class="sidebar icon"></i>
      </div>
      <div class="content" style="padding-top: 0px">
        <div class="ui fluid vertical menu inverted ">
          <a href="{{route('home')}}" class="item body_font">{{trans('menu.home')}}</a>
          <div class="item">
            <div class="accordion">
              <div class="title body_font" style="padding:0;">
                {{trans('menu.the_president')}}
                <i class="caret down icon" style="float:{{$indir}};"></i>
              </div>
              <div class="content" id="mobile_menu_accordion">
                <div class="menu">
                  <a href="{{route('decrees')}}" class="item body_font">{{trans('menu.decrees')}}</a>
                  <a href="{{route('orders')}}" class="item body_font">{{trans('menu.orders')}}</a>
                  <a href="{{route('statements')}}" class="item body_font">{{trans('menu.statements')}}</a>
                  <a href="{{route('messages')}}" class="item body_font">{{trans('menu.messages')}}</a>
                  <a href="{{route('words')}}" class="item body_font">{{trans('menu.words')}}</a>
                  <div class="item">
                    <div class="accordion">
                      <div class="title body_font" style="padding:0;">
                        {{trans('menu.trips')}}
                        <i class="caret down icon" style="float:{{$indir}};"></i>
                      </div>
                      <div class="content">
                        <div class="menu">
                           <a href="{{route('international_trips')}}" class="item">
                            {{trans('menu.international_trips')}}
                          </a>
                          <a href="{{route('domestic_trips')}}" class="item">
                            {{trans('menu.domestic_trips')}}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('biography')}}" class="item body_font">{{trans('menu.biography')}}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
              <div class="accordion">
                <div class="title body_font" style="padding:0;">
                  {{trans('menu.media')}}
                  <i class="caret down icon" style="float:{{$indir}};"></i>
                </div>
                <div class="content">
                  <div class="menu">
                     <a href="{{route('news')}}" class="item body_font">{{trans('menu.news')}}</a>
                      <a href="{{route('articles')}}" class="item body_font">{{trans('menu.articles')}}</a>
                      <a href="{{route('infographics')}}" class="item body_font">{{trans('menu.infographics')}}</a>
                      <a href="{{route('documents')}}" class="item body_font">{{trans('menu.reports_and_documents')}}</a>
                      <a href="{{route('photo_albums')}}" class="item body_font">{{trans('menu.photo_albums')}}</a>
                      <a href="{{route('videos')}}" class="item body_font">{{trans('menu.videos')}}</a>
                      <a href="{{route('links')}}" class="item body_font">{{trans('menu.links')}}</a>
                  </div>
                </div>
              </div>
             </div>
             <div class="item">
              <div class="accordion">
                <div class="title body_font" style="padding:0;">
                  {{trans('menu.about_us')}}
                  <i class="caret down icon" style="float:{{$indir}};"></i>
                </div>
                <div class="content">
                  <div class="menu">
                      <a href="{{route('ocs')}}" class="item body_font">{{trans('menu.ocs')}}</a>
                      <a href="{{route('chief_of_staff')}}" class="item body_font">{{trans('menu.chief_of_staff')}}</a>
                      <a href="{{route('organizational_structure')}}" class="item body_font">{{trans('menu.organizational_structure')}}</a>
                      <a href="{{route('presidential_palace')}}" class="item body_font">{{trans('menu.presidential_palace')}}</a>
                  </div>
                </div>
              </div>
             </div>
             <div class="item">
              <div class="accordion">
                <div class="title body_font" style="padding:0;">
                  {{trans('menu.contact_us')}}
                  <i class="caret down icon" style="float:{{$indir}};"></i>
                </div>
                <div class="content">
                  <div class="menu">
                    <a href="{{route('register_complaint')}}" class="item body_font">{{trans('menu.complaint_regestration')}}</a>
                    <a href="{{route('media_directorate')}}" class="item body_font">{{trans('menu.media_directorate')}}</a>
                    <div class="item">
                      <div class="accordion">
                        <div class="title body_font" style="padding:0;">
                          {{trans('menu.subscription')}}
                          <i class="caret down icon" style="float:{{$indir}};"></i>
                        </div>
                        <div class="content">
                          <div class="menu">
                            <a href="{{route('media_form')}}" class="item">
                              {{trans('menu.media_form')}}
                            </a>
                            <a href="{{route('journalist_form')}}" class="item">
                              {{trans('menu.journalist_form')}}
                            </a>
                            <a href="{{route('expert_form')}}" class="item">
                              {{trans('menu.expert_form')}}
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
   </div>
  {{-- mobile menu ends --}}

   <div class="ui grid" id="mobile_search_box" style="background-color:#0f4782;padding-bottom:0px;display:none;">
    <div class="column" style="padding:5px 14px !important;margin-top:4px;">
      <div class="ui container" style="width:57%;padding-left:10px;">
        <form class="ui form" action="{{url('search')}}" name="search_form">
          <div class="field" style="display: inline;float: {{$dir}};width: auto">
            <div class="ui icon input">
              <input class="prompt body_font" style="direction:{{$ltr}};" name="search" id="search_text" type="text" placeholder="{{trans('home.search')}}">
              <i class="search icon"></i>
            </div>
          </div>
          <a class="ui active button" href="{{route('advance_search')}}" target="_blank" style="margin-left:10px;font-size: 9px">
                {{trans('menu.advanced_search')}}
              </a>
        </form>
      </div>
    </div>
  </div>


  <div class="ui grid container" style="margin-top:0 !important;margin-bottom:10px !important;">
    {{-- left side_bar -> president_words and social boxes ends --}}
    <div class="sixteen wide tablet mobile four wide computer column">

      <div class="ui fluid card">
        <div class="content">
          <div class="header title_font test" style="">{{trans('menu.news')}}</div>
          @foreach($news as $item)
            <div class="latest_articles {{($item==$news->last())?'no_border':''}}" style="padding-top:14px;">
              <a href="{{url('news_details/'.$item->id)}}" class="ui tiny header title_font" dir="rtl" style="text-align:{{$dir}};padding-{{$dir}}:10px;display: block;margin-bottom:0;">{{$item->$title}}</a>
              <div class="meta body_font" style="text-align:{{$indir}};" dir="rtl">{{$item->$date}}</div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="ui fluid card" style="">
        <div class="content" >
          <div class="ui centered grid">
            <div class="row">
              <div class="fb-page" data-href="https://www.facebook.com/ocs.afg/" data-tabs="timeline" data-width="500" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ocs.afg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ocs.afg/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
            </div>
            <div class="row">
              <div class="fb-page" data-href="https://www.facebook.com/ocs.afg/" data-tabs="timeline" data-width="500" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ocs.afg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ocs.afg/">‎ریاست عمومی دفتر مقام عالی ریاست جمهوری‎</a></blockquote></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- left side_bar -> president_words and social boxes ends --}}

    <div class="sixteen wide tablet mobile eight wide computer column" style="margin-top:17px;">
      {{-- carousel starts --}}
      <div class="ui stackable segment masthead" style="margin-top:0;">
        <div class="owl-carousel" style="">
          @foreach($news as $value)
          <div class="item">
            <div class="ui stackable container grid" id="carousel_div">
              <div class="sixteen wide column" id="carousel_image_div" >
                <div class="carousel_thumbnail">
                  <img style="" src="{{asset('uploads/media/news/'.$value->image)}}" alt="">
                </div>
              </div>
              <div class="sixteen wide column" id="carousel_text_div">
                <blockquote>
                  <a href="{{url('news_details/'.$value->id)}}" class="ui header title_font" style="display:block">{{$value->$title}}</a>
                  <p class="body_font" style="color:#888;font-size:14px;" dir="rtl">{{($lang!='en')?$jdate->detailedDate($value->$date,$lang):$value->$date}}</p>
                  <div style="font-size:17px;" class="body_font">{{$value->$short_desc}}</div>
                  <a class="body_font" href="{{url('news_details/'.$value->id)}}" style="color:#888;font-size:14px;float:{{$indir}}">{{trans('home.read_more')}}</a>
                </blockquote>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      {{-- carousel ends --}}
      {{-- articles and latest news starts --}}
      <div class="ui fluid  card" style="">
        <div class="content" >
          <div class="header title_font test">{{trans('home.articles')}}</div>
          <div class="ui items">
            @foreach($articles as $article)
            <div class="item" style="direction:{{$rtl}};margin-top:8;">
              <div class="thumbnail news_image">
                <img src="{{asset('uploads/media/articles/'.$article->image)}}" alt="Image" />
              </div>
              <div class="content">
                <a href="{{url('article_details/'.$article->id)}}" class="ui {{$dir}} floated small header title_font" dir="rtl" style="padding-right:10px;font-size:13px;">{{$article->$title}}</a>
                <div class="ui {{$dir}} floated meta body_font" style="padding-right:10px;clear:both;" dir="rtl">{{$article->$date}}</div>
              </div>
            </div>
            <div class="description body_font" style="">{{$article->$short_desc}}</div>
            <a href="{{url('article_details/'.$article->id)}}" class="meta body_font" style="float:{{$indir}}">{{trans('home.read_more')}}</a>

            <hr class="{{($article == $articles->last())?'no_border':''}}" style="margin-top:25px;">
            @endforeach
          </div>
        </div>
      </div>
      <div class="ui fluid  card" style="">
        <div class="content" >
          <div class="header title_font test" style="">{{trans('home.reports_and_documents')}}</div>
          <div class="ui items">
            @foreach($documents as $document)
            <div class="item" style="direction:{{$rtl}};">
              <div class="ui image icon">
                <i class="icon huge file pdf outline"></i>
              </div>
              <div class="top aligned content" style="padding-top:5px;">
                <a class="ui right floated small header title_font" style="padding-right:10px;padding-bottom:3px;width:100%;">{{$document->$title}}</a>
                <div class="meta body_font" style="padding-right:10px;" dir="rtl">{{$document->$date}}</div>
              </div>
            </div>
            <hr class="{{($document == $documents->last())?'no_border':''}}">
            @endforeach
          </div>
        </div>
      </div>
      {{-- articles and latest news ends --}}

    </div>
    {{-- right side_bar -> news and videos starts --}}
    <div class="sixteen wide tablet mobile four wide computer column">
      <div class="ui fluid card" style="">
        <div class="content" >
          <div class="header title_font test" style="">{{trans('home.latest_news')}}</div>
          <div class="" style="margin-top:21px;">
            @foreach($news as $value)
            <div class="{{($value == $news->last())?'no_border':''}} latest_articles">
              <a href="{{url('news_details/'.$value->id)}}" class="ui small header title_font" style="display:block;padding-right:10px;margin-bottom:0;">{{$value->$title}}</a>
              <a href="{{url('news_details/'.$value->id)}}" class="meta body_font" style="float:{{$indir}}">{{$value->$date}}</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="ui fluid card" style="">
        <div class="content" >
          <div class="header title_font test" style="">{{trans('home.videos')}}</div>
        </div>
        <div class="content" style="border:0;!">
          <div class="ui stackable grid" style="">
            @foreach($videos as $video)
            <div class="row" style="">
              <div class="column">
                <div class="image"> <iframe width="100%" src="https://www.youtube.com/embed/{{$video->url_en}}" frameborder="0" allowfullscreen></iframe></div>
                <div class="ui small header title_font" style="margin:0;padding:0;width:100%;">{{$video->$title}}</div>
                <div class="meta body_font" dir="" style="float:{{$indir}}">{{$video->$date}}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    {{-- right side_bar -> news and videos ends --}}
  </div>

  {{-- @php
    $news = DB::table('media')->where('type','news')->take('4')->get();
    $articles = DB::table('media')->where('type','article')->take('5')->get();

  @endphp --}}
  {{-- footer segment starts --}}
  <div class="ui segment" style="background-color:#3274b9;border-bottom:0 !important;">
    <div class="ui three column container stackable grid" style="margin-top:5px;">
      <div class="column">
        <div class="ui three column stackable grid">
          <div class="column">
            <h3 class="ui header title_font">{{trans('menu.about_us')}}</h3>
          </div>
          <div class="column">
            <h3 class="ui header title_font">{{trans('menu.media')}}</h3>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.home')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.articles')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.infographics')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.reports_and_documents')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.photo_albums')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.videos')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0;">{{trans('menu.links')}}</a>
          </div>
          <div class="column">
            <h3 class="ui header title_font">{{trans('menu.the_president')}}</h3>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.decrees')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.orders')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.statements')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.messages')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.words')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.trips')}}</a>
            <a href="#" class="ui {{$dir}} floated tiny header body_font" style="width:100%;margin:5px 0">{{trans('menu.biography')}}</a>
          </div>
        </div>
      </div>
      <div class="column">
        <h3 class="ui header title_font" style="">{{trans('home.latest_news')}}</h3>
        @foreach($news as $item)
          <a href="{{url('news_details/'.$item->id)}}" class="ui {{$dir}} floated tiny header body_font" style="margin:5px 0;width:100%;">{{$item->$title}}</a>
        @endforeach

      </div>
      <div class="column">
        <h3 class="ui header title_font" style="">{{trans('menu.articles')}}</h3>
        @foreach($articles as $article)
          <a href="{{url('article_details/'.$article->id)}}" class="ui {{$dir}} floated tiny header body_font" style="margin:5px 0;width:100%;">{{$article->$title}}</a>
        @endforeach
      </div>
    </div>
  </div>
  {{-- footer segment ends --}}

  {{-- lower footer starts --}}
  <div class="ui segment" style="margin-top:0;background:#08131f;border:0 !important;padding-bottom:18px;">
    <div class="ui equal width centered container grid" id="footer_content">
      <div class="sixteen wide tablet mobile five wide computer column"></div>
      <div class="sixteen wide tablet mobile five wide computer column" style="">
        <p style="margin-left:auto;margin-right:auto;text-align:center;color:white;">www.ocs.gov.af <i class="copyright icon"></i> All Rights Reserved</p>
      </div>
      <div class="sixteen wide tablet mobile six wide computer column">
        <div class="ui centered grid" style="" id="footer_social_buttons">
          <div class="column" style="direction:ltr !important;">
            <div class="ui tiny circular inverted basic icon button" id="footer_social_first_button">
              <i class="icon facebook f"></i>
            </div>
            <div class="ui tiny circular inverted basic icon button">
              <i class="icon twitter"></i>
            </div>
            <div class="ui tiny circular inverted basic icon button">
              <i class="icon instagram"></i>
            </div>
            <div class="ui tiny circular inverted basic icon button">
              <i class="icon youtube"></i>
            </div>
            <div class="ui tiny circular inverted basic icon button">
              <i class="icon rss"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- lower footer ends --}}
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
  <script src="{{asset('assets/admin-asset/js/persian-datepicker-0.4.5.min.js')}}"></script>
  <script src="{{asset('assets/admin-asset/js/persian-date.js')}}"></script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>





    <script>

    // $('#search_form').submit(function(){

    //   $.ajax({
    //     url:  '{{url('search')}}',
    //     type : 'GET',
    //     success : function(data){
    //       alert(data);
    //     },
    //     error: function(data){
    //       alert('not found')
    //     }
    //   });
    // });



    //add to any script starts
    var a2a_config = a2a_config || {};
    a2a_config.prioritize = ["facebook", "twitter", "google_plus", "email", "print"];
    //add to any script ends



  // menu bar responsiveness script starts
    $(document).ready(function(){

      // carousel script starts
      $('.owl-carousel').owlCarousel({
          items:1,
          dots:true,
          autoplayHoverPause:true,
          {{($lang=='en')?'rtl:true,':''}}
          loop:true,
          margin: 10,
          autoplay:true,
          autoHeight:false,
          merge:true,
          dots:true,
          navSpeed:5000,
          autoplaySpeed:1000,
          responsiveClass:true,
          responsive: {
            0: {
              items:1,
              loop:false
            },
            480: {
              items:2
            },
            768: {

            }

          }
      });
      // carousel script ends

      // fixed menu script starts
       $('#menu_bar')
         .visibility({
           once: false,
           onBottomPassed: function() {
             $('.fixed.menu').transition('fade in');
           },
           onBottomPassedReverse: function() {
             $('.fixed.menu').transition('fade out');
           }
         })
       ;
      // fixed menu script ends


      var width = $(window).width();
     if(width<=1440 && width >1024) {
          // $('#arg').removeClass('six wide column');
          // $('#arg').addClass('four wide column');
      }
      else if(width >1440){
        // $('#arg').removeClass('six wide column');
        // $('#arg').addClass('three wide column');
          $('#social').css("{{$dir}}","30px");
          @if($lang=='en')
            $('#social').removeClass('eight wide column');
            $('#social').addClass('six wide column');
          @endif
      }
      if(width<768) {
        $('#footer_content').removeClass('container');
        $('#main').removeClass('centered');
        $('#main').removeClass('container');
      }


      //dropdown script
      $('.dropdown').dropdown({
          on: 'hover',allowAdditions:true,
        });
        $('.ui.accordion').accordion('refresh');
      });
  // menu bar responsiveness script ends

  $(document).ready(function() {
         $(".date_dr").pDatepicker({
          format : "YYYY - MM - DD"
        });
      });


  //language switcher script starts
   $('.languageSwitcher').click(function () {
      var locale = $(this).prop('id')
      var _token  = $("input[name=_token]").val();
      $.ajax({
        url:"{{url('language')}}",
        type:"get",
        data:{locale:locale,_token:_token},
        datatype:"json",
        success: function(data){

          window.location.reload(true);
        },
        error: function(data){

        },
        beforeSend: function(data){

        },
      });
  });
  //language switcher script ends

  // substr short description & carousel header text omitting script

  $('.short_desc').text(function(index,currentText) {
    return currentText.substr(0,145);
  });

  $('.short_desc').append(' ...');


  //

  //search expand on click
  $('#search').click(function() {
    var display = $('#search_box').css('display');
    if(display=='none') {
      $('#search_box').css('display','block');
    }
    else {
      $('#search_box').css('display','none');
    }
  });

  $('#mobile_search').click(function() {
    var display = $('#mobile_search_box').css('display');
    $('.ui.accordion .content').removeClass('active');
    if(display=='none') {
      $('#mobile_search_box').css('display','block');
      $('#mobile_search_box').css('height','142px');
      $('#mobile_search_box').css('padding-top','65px');
    }
    else {
      $('#mobile_search_box').css('display','none');
    }
  });
  </script>

  </body>
  </html>
