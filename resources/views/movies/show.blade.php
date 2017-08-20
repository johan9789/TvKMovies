@extends('layout')

@section('content')

<script>
var title = '{{ strtolower($title) }}';
</script>

<div class="general-agileits-w3l" ng-controller="ShowController">
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
                        <div ng-repeat="movie in movies.data track by $index">
							<div class="col-md-2 w3l-movie-gride-agile">
                                <a href="[[ movie.trailer_url ]]" class="hvr-shutter-out-horizontal" target="[[ movie.trailer_url ? '_blank' : '']]">
                                    <img ng-model="movie" ng-src="[[ coverPath(movie.cover) ]]" title="[[ movie.other_name ]]" class="img-responsive" alt=" " width="182" height="268">
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
                                                    <a href="#" id="star_to_movie" data-id="[[ movie.id ]]" data-qualification="[[ i ]]">
                                                        <i id="i_star_to_movie" class="[[ movie.rating >= i ? 'fa fa-star' : 'fa fa-star-o' ]]" aria-hidden="true"></i>
                                                    </a>
                                                </li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
                                <div class="ribben">
                                    <p>[[ movie.status ]]</p>
                                </div>
							</div>
                            <div class="clearfix" ng-if="($index + 1) % 6 == 0"></div>
                        </div>
					</div>
				</div>
			</div>
			<div class="blog-pagenat-wthree">
                <ul ng-if="movies.last_page > 1">
                    <li class="[[ movies.current_page == 1 ? 'disabled' : '' ]]">
                        <a class="frist" ng-click="changePage(movies.current_page - 1)">Prev</a>
                    </li>
                    <li ng-repeat="page in pages">
                        <a class="[[ movies.current_page == page ? 'frist' : '' ]]" ng-click="changePage(page)">[[ page ]]</a>
                    </li>
                    <li class="[[ movies.current_page == movies.last_page ? 'disabled' : '' ]]">
                        <a class="last" ng-click="changePage(movies.current_page + 1)">Next</a>
                    </li>
                </ul>
				<!-- @include('movies.pagination', ['paginator' => $movies]) -->
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
