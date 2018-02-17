
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Andragogy an Educational School Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Andragogy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //custom-theme -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
    <!-- //js -->
    <!-- font-awesome-icons -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- header -->
<div class="header_address_mail">
    <div class="container">
        <div class="agileits_w3layouts_header_address_grid">
            <ul>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                <li>+(000) 123 234 22</li>
            </ul>
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="w3_agile_logo">
            <h1><a href="index.html"><span>A</span>ndragogy</a></h1>
        </div>
        <div class="header-nav">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-12">
                        <ul class="nav navbar-nav w3_agile_nav">
                            <li><a href="{{ url('/home') }}">Home</a></li>
                            @if (Auth::check())
                                @if (Auth::user()->role_id == 1)
                                    @include('layouts.admin_nav')
                                @elseif (Auth::user()->role_id == 2)
                                    @include('layouts.student_nav')
                                @elseif (Auth::user()->role_id == 3)
                                    @include('layouts.supervisor_nav')
                                @endif
                            @else
                                @include('layouts.guest_nav')
                            @endif

                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span data-hover="Short Codes">
                                        {{ Auth::user()->name }}
                                    </span> <b class="caret"></b></a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- header -->
@yield('content')
<!-- subscribe -->
<div class="footer-top">
    <div class="container">
        <div class="col-md-4 welcome">
            <h3>Andragogy</h3>
            <p>The opportunity to help students learn and grow. Come be a part of our schools, whether as an involved parent, a student, a community volunteer, or a partner. Pulling together, we can accomplish our goal.</p>

        </div>
        <div class="col-md-3 address">
            <h3>Address</h3>
            <p>Eiusmod Tempor inc
                <span>St Dolore Place,Kingsport 56777.</span>
            </p>
            <p class="phone">Phone : +1 123 456 789
                <span>Email : <a href="mailto:example@email.com">mail@example.com</a></span>
                <span>FAX : <a href="mailto:example@email.com">123 456 7890</a></span>
            </p>
        </div>
        <div class="col-md-5 wthree-subscribe">
            <h3>Newsletter </h3>
            <p>Receive the latest useful information, daily.</p>
            <div class="w3-agileits-subscribe-form">
                <form action="#" method="post">
                    <input type="text" placeholder="Email" name="Subscribe" required="">
                    <button class="btn1">Subscribe</button>
                </form>
            </div>
            <div class="agile_header_social">
                <ul class="agileits_social_list">
                    <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //subscribe -->
<!-- copy-right -->
<div class="copy-right-grids">
    <div class="container">
        <div class="copy-left">
            <p class="footer-gd">© 2017 Andragogy. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts</a></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //copy-right -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="{{ url('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
<script src="{{ url('js/bootstrap.js') }}"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
</body>
</html>