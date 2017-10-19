@extends('layout')

@section('content')

<script>
var title = '{{ strtolower($title) }}';
function up(){
    var arriba;
    if(document.body.scrollTop != 0 || document.documentElement.scrollTop != 0){
        window.scrollBy(0, -15);
        arriba = setTimeout('up()', 10);
    } else {
        clearTimeout(arriba);
    }
};
</script>

<div class="general-agileits-w3l" ng-controller="ShowController as show" ng-init="show.getMovies()">
	<div class="w3l-medile-movies-grids">
		<div class="movie-browse-agile">
			<div class="browse-agile-w3ls general-w3ls">
				<div class="tittle-head">
					<h4 class="latest-text">{{ $title }} Movies </h4>
					<div class="container">
						<div class="agileits-single-top">
							<ol class="breadcrumb">
							  <li><a href="{{ url('') }}">Home</a></li>
							  <li class="active">Movies</li>
							</ol>
						</div>
					</div>
				</div>
			 	<div class="container">
					<div class="browse-inner-come-agile-w3">
                        <div ng-repeat="movie in show.movies.data track by $index">
							<div class="col-md-2 w3l-movie-gride-agile">
                                <a href="[[ movie.trailer_url ]]" class="hvr-shutter-out-horizontal" target="[[ movie.trailer_url ? '_blank' : '']]">
                                    <img ng-model="movie" ng-src="[[ show.coverPath(movie.cover) ]]" title="[[ movie.other_name ]]" class="img-responsive" alt=" " width="182" height="268">
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
								<div class="mid-1">
									<div class="w3l-movie-text">
										<h6><a href="#">[[ movie.name ]]</a></h6>
									</div>
									<div class="mid-2">
                                        <p>[[ movie.release_year ]]</p>
										<div class="block-stars">
											<ul class="w3l-ratings">
                                                <li ng-repeat="i in [1, 2, 3, 4, 5]">
                                                    <a style="cursor: pointer;">
                                                        <i ng-click="show.qualifyMovie(movie, i)" ng-class="movie.rating >= i ? 'fa fa-star' : 'fa fa-star-o'" aria-hidden="true"></i>
                                                    </a>
                                                </li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
                                <div class="ribben" ng-click="show.updateMovieStatus(movie)" ng-mouseover="show.mouseOverStatus(movie)" ng-mouseleave="show.changePage(show.movies.current_page)" style="cursor: pointer;">
                                    <p>[[ movie.status ]]</p>
                                </div>
							</div>
                            <div class="clearfix" ng-if="($index + 1) % 6 == 0"></div>
                        </div>
					</div>
				</div>
			</div>
			<div class="blog-pagenat-wthree">
                <ul ng-if="show.movies.last_page > 1">
                    <li class="[[ show.movies.current_page == 1 ? 'disabled' : '' ]]">
                        <a class="frist" ng-click="show.changePage(show.movies.current_page - 1, true)">Prev</a>
                    </li>
                    <li ng-repeat="page in show.pages">
                        <a class="[[ show.movies.current_page == page ? 'frist' : '' ]]" ng-click="show.changePage(page, true)">[[ page ]]</a>
                    </li>
                    <li class="[[ show.movies.current_page == show.movies.last_page ? 'disabled' : '' ]]">
                        <a class="last" ng-click="show.changePage(show.movies.current_page + 1, true)">Next</a>
                    </li>
                </ul>
			</div>
		</div>
		<div class="review-slider">
		 	<h4 class="latest-text">Random Movies</h4>
		   	<div class="container">
				<div class="w3_agile_banner_bottom_grid">
					<div id="owl-demo" class="owl-carousel owl-theme">
						@include('movies.list.carousel', ['movies' => $randomMovies])
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
