<!DOCTYPE html>
<html lang="en" ng-app="tvkMoviesApp">
<head>
<title>TvK Movies</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script type="application/x-javascript">
addEventListener("load", function(){ setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){
    window.scrollTo(0, 1);
}
</script>
<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="{{ URL::asset('css/contactstyle.css') }}" type="text/css" media="all">
<link rel="stylesheet" href="{{ URL::asset('css/faqstyle.css') }}" type="text/css" media="all">
<link href="{{ URL::asset('css/medile.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ URL::asset('css/single.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ URL::asset('css/jquery.slidey.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="https://use.fontawesome.com/f54b360281.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
<link href="{{ URL::asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
<script>
$(document).ready(function(){
    $("#owl-demo").owlCarousel({
        autoPlay: 3000, // Set AutoPlay to 3 seconds
        items : 5,
        itemsDesktop : [640,4],
        itemsDesktopSmall : [414,3]
    });
});
</script>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ URL::asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/easing.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1000);
    });
});
</script>
<script type="text/javascript" src="{{ URL::asset('app/js/layout.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-route.js"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/sections/home/main-menu.controller.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/sections/home/show.controller.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/sections/home/next-releases.controller.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/directives/split-movies/split-movies.directive.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('app/angular/services/movie.service.js') }}"></script>
@yield('scripts')
<script type="text/javascript">
var url = {
    api: {
        genres: '{{ route('api.genres.index') }}',
        qualities: '{{ route('api.qualities.index') }}',
        countries: '{{ route('api.countries.index') }}',
        movie: '{{ route('api.movie.index') }}',
        movieList: {
            all: '{{ route('api.movie_list.index') }}',
            soon: '{{ route('api.movie_list.index', ['scope' => 'soon']) }}',
            pending: '{{ route('api.movie_list.index', ['scope' => 'pending']) }}',
            topRated: '{{ route('api.movie_list.index', ['scope' => 'topRated']) }}',
            downloaded: '{{ route('api.movie_list.index', ['scope' => 'downloaded']) }}',
            nextReleases: '{{ route('api.movie_list.index', ['scope' => 'nextReleases']) }}',
            future: '{{ route('api.movie_list.index', ['scope' => 'future']) }}'
        },
        qualifyMovie: '{{ route('qualify-movie') }}',
        updateStatus: '{{ route('api.movie_list.update_status') }}'
    },
    path: {
        movieCover: '{{ URL::asset(config('paths.MOVIE_COVER')) }}'
    }
};
</script>
</head>
<body>

<!-- header -->
<div class="header">
    <div class="container">
        <div class="w3layouts_logo">
            <a href="{{ url('/') }}"><h1>TvK<span>Movies</span></h1></a>
        </div>
        <div class="w3_search">
            <form action="#" method="post">
                <input type="text" name="Search" placeholder="Search" required="">
                <input type="submit" value="Go">
            </form>
        </div>
        <div class="w3l_sign_in_register">
            <ul>
                <!-- <li><i class="fa fa-phone" aria-hidden="true"></i> (+000) 123 345 653</li >--> 
                <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->

<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Sign In & Sign Up
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle">
                                <i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="submit" value="Login">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Create an account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="Username" placeholder="Username" required="">
                                    <input type="password" name="Password" placeholder="Password" required="">
                                    <input type="email" name="Email" placeholder="Email Address" required="">
                                    <input type="text" name="Phone" placeholder="Phone Number" required="">
                                    <input type="submit" value="Register">
                                </form>
                            </div>
                            <div class="cta"><a href="#">Forgot your password?</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
$('.toggle').click(function(){
    // Switches the Icon
    $(this).children('i').toggleClass('fa-pencil');
    // Switches the forms
    $('.form').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: "toggle"
    }, "slow");
});
</script>
<!-- //bootstrap-pop-up -->

<!-- nav -->
<div class="movies_nav">
    <div class="container">
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
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" ng-controller="MainMenuController as menu">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('') }}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movies <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{ route('movies.downloaded') }}" target="_blank">Downloaded</a></li>
                                            <li><a href="{{ route('movies.pending') }}" target="_blank">Pending</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{ route('movies.soon') }}" target="_blank">Soon</a></li>
                                            <li><a href="{{ route('movies.future') }}" target="_blank">Future</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{ route('movies.quality') }}" target="_blank">Quality</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4" ng-repeat="genreGroup in menu.genresList">
                                        <ul class="multi-column-dropdown">
                                            <li ng-repeat="genre in genreGroup">
                                                <a href="#">[[ genre.name ]]</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quality <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4" ng-repeat="qualityGroup in menu.qualityList">
                                        <ul class="multi-column-dropdown">
                                            <li ng-repeat="quality in qualityGroup">
                                                <a href="{{ URL::to('movies/quality/[[ quality ]]') }}" ng-model="quality">[[ quality ]]</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    <div class="col-sm-4" ng-repeat="countryGroup in menu.countryList">
                                        <ul class="multi-column-dropdown">
                                            <li ng-repeat="country in countryGroup">
                                                <a href="#">[[ country.name ]]</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- <li><a href="series.html">tv - series</a></li> -->
                        <!-- <li><a href="list.html">A - z list</a></li> -->
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
<!-- //nav -->

<div class="general_social_icons">
    <nav class="social">
        <ul>
            <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
            <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
            <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
        </ul>
    </nav>
</div>

@yield('content')

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3ls_footer_grid">
            <div class="col-md-6 w3ls_footer_grid_left">
                <div class="w3ls_footer_grid_left1">
                    <h2>Subscribe to us</h2>
                    <div class="w3ls_footer_grid_left1_pos">
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Your email..." required="">
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 w3ls_footer_grid_right">
                <a href="index.html"><h2>TvK<span>Movies</span></h2></a>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-5 w3ls_footer_grid1_left">
            <p>&copy; 2016 TvK Movies. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
        <div class="col-md-7 w3ls_footer_grid1_right">
            <ul>
                <li><a href="genres.html">Movies</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="horror.html">Action</a></li>
                <li><a href="genres.html">Adventure</a></li>
                <li><a href="comedy.html">Comedy</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //footer -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".dropdown").hover(
        function(){
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function(){
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->

<!-- here stars scrolling icon -->
<script type="text/javascript">
$(document).ready(function(){
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

<span id="url_app" data-url="{{ url('') }}"></span>
<span id="url_movie_list_update_status" data-url="{{ route('api.movie_list.update_status') }}"></span>

</body>
</html>
