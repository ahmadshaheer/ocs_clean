<!DOCTYPE HTML>
<head>
<title>OCS Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="OGPA" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >

<!-- //semantic-css -->
<link rel="stylesheet" href="{{asset('assets/css/semantic.min.css')}}" >
<!-- Custom CSS -->
<link href="{{asset('assets/admin-asset/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('assets/admin-asset/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('assets/admin-asset/css/font.css')}}" type="text/css"/>
<link href="{{asset('assets/admin-asset/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/admin-asset/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('assets/admin-asset/css/persian-datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icon.min.css')}}">

<!-- //calendar -->
<!-- //font-awesome icons -->
<style>
.test {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.rtl{
  direction: rtl !important;
}
.mce-branding-powered-by{
    display: none;
}
div.mce-fullscreen {
  top:80px !important;
}
@media (min-width: 1200px) {
  .col-lg-6,.col-md-6 {
    width:46%;
  }
}
.test img{
    max-width: 100%;
}
footer.timeline-Footer.u-cf {
    display: none !important;

}
</style>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{route('admin')}}" class="logo">
        OCS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
            <div class="ui label green">Logged in as <strong>{{Session::get('username')}}</strong></div>
            <a href="{{route('logout')}}" class="ui button orange tiny"><i>Logout</i></a>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside >
    <div id="sidebar" class="nav-collapse" style="overflow-y:scroll;">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
               {{--  <li>
                    <a class="active" href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>About the President</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="{{route('admin_decree')}}">
                                <span>Decrees</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin_order')}}">
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin_statement')}}">
                                <span>Statments</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{route('admin_message')}}">
                                <span>Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin_word')}}">
                                <span>Words</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:void(0)">
                                <span>Trips</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a href="{{route('admin_domestic')}}">
                                        <span>Domestic Trips</span>
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{route('admin_international')}}">
                                        <span>International Trips</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('the_bio.index')}}">
                                <span>Biogaphy</span>
                            </a>
                        </li>
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Media</span>
                    </a>
                    <ul class="sub">
                       <li>
                            <a href="{{route('admin_news')}}">
                                <span>News</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{route('admin_article')}}">
                                <span>Articles</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{route('infographic.index')}}">
                                <span>InfoGraphics</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('documents.index')}}">
                                <span>Documents</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('album.index')}}">
                                <span>Album</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('videos.index')}}">
                                <span>Videos</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{route('links.index')}}">
                                <span>Links</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>About Us</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="{{route('the_ocs.index')}}">
                                <span>OCS</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('the_chief.index')}}">
                                <span>Chief Of Staff</span>
                            </a>
                        </li>
                        <li><a href="#">Organizational Structure</a></li>
                         <li>
                            <a href="{{route('the_palace.index')}}">
                                <span>Presidential Palace</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-phone-square"></i>
                        <span>Contact Us</span>
                    </a>
                    <ul class="sub">
                <li>
                    <a href="{{route('media_directorate.index')}}">
                        <i class="fa fa-envelope"></i>
                        <span>Media Directorate</span>
                    </a>
                </li>
                    </ul>
                </li>
                   <li class="sub-menu">
                            <a href="javascript:void:;">
                                <i class="fa fa-user-circle"></i>
                                <span>Register Users</span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a href="{{route('view_media_register')}}">
                                        <span>Media Staff Register</span>
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{route('view_journalist_register')}}">
                                        <span>Journalist Register</span>
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{route('view_expert_register')}}">
                                        <span>Expert Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                 <li>
                    <a href="{{route('quotes.index')}}">
                        <i class="fa fa-quote-left"></i>
                        <span>Quotes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users')}}">
                        <i class="fa fa-user-plus"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
