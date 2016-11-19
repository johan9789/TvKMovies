@extends('layout')

@section('content')

<!-- /w3l-medile-movies-grids -->
<div class="general-agileits-w3l">
	<div class="w3l-medile-movies-grids">
		<!-- /movie-browse-agile -->
		<div class="movie-browse-agile">
			<!--/browse-agile-w3ls -->
			<div class="browse-agile-w3ls general-w3ls">
				<div class="tittle-head">
					<h4 class="latest-text">Downloaded Movies </h4>
					<div class="container">
						<div class="agileits-single-top">
							<ol class="breadcrumb">
							  <li><a href="index.html">Home</a></li>
							  <li class="active">Genres</li>
							</ol>
						</div>
					</div>
				</div>
			 	<div class="container">
					<div class="browse-inner-come-agile-w3">
						@foreach($downloaded_movies as $index => $movie)
							<div class="col-md-2 w3l-movie-gride-agile">
								<a href="single.html" class="hvr-shutter-out-horizontal">
								 	<img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " width="182" height="268">
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1">
									<div class="w3l-movie-text">
										<h6><a href="single.html">{{ $movie->name }}</a></h6>
									</div>
									<div class="mid-2">
										<p>{{ date('Y', strtotime($movie->release_date)) }}</p>
										<div class="block-stars">
											<ul class="w3l-ratings">
										 		<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								@if($movie->seen)
									<div class="ribben"><p>✔</p></div>
								@else
									<div class="ribben"><p>✘</p></div>
								@endif
							</div>
							@if(($index + 1) % 6 == 0)
								<div class="clearfix"></div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
			<!--//browse-agile-w3ls -->
			<div class="blog-pagenat-wthree">
				@include('movies.pagination', ['paginator' => $downloaded_movies])
			</div>
		</div>
		<!-- //movie-browse-agile -->
		<!--body wrapper start-->
		<!--body wrapper start-->
		<div class="review-slider">
		 	<h4 class="latest-text">Random Movies</h4>
		   	<div class="container">
				<div class="w3_agile_banner_bottom_grid">
					<div id="owl-demo" class="owl-carousel owl-theme">
						@foreach($random_movies as $movie)
							<div class="item">
								<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
									<a href="single.html" class="hvr-shutter-out-horizontal">
										<img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" class="img-responsive" alt=" " width="182" height="268">
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">{{ $movie->name }}</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>{{ date('Y', strtotime($movie->release_date)) }}</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									@if($movie->downloaded)
										@if($movie->seen)
											<div class="ribben"><p>✔</p></div>
										@else
											<div class="ribben"><p>✘</p></div>
										@endif
									@else
										<div class="ribben"><p>SOON</p></div>
									@endif
								</div>
							</div>
						@endforeach
					</div>
				</div>
			   	<!--body wrapper end-->
			</div>
		</div>
	</div>
	<!-- //w3l-medile-movies-grids -->
</div>
<!-- //comedy-w3l-agileits -->

@endsection