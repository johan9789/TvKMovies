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
							  <li><a href="{{ url('') }}">Home</a></li>
							  <li class="active">Movies</li>
							</ol>
						</div>
					</div>
				</div>
			 	<div class="container">
					<div class="browse-inner-come-agile-w3">
						@foreach($downloadedMovies as $index => $movie)
							<div class="col-md-2 w3l-movie-gride-agile">
								<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
								 	<img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " width="182" height="268">
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1">
									<div class="w3l-movie-text">
										<h6><a href="#">{{ $movie->name }}</a></h6>
									</div>
									<div class="mid-2">
										<p>{{ date('Y', strtotime($movie->release_date)) }}</p>
										<div class="block-stars">
											<ul class="w3l-ratings">
												@for($i=1;$i<=5;$i++)
													<li>
														<a href="#" id="star_to_movie" data-id="{{ $movie->id }}" data-qualification="{{ $i }}">
															<i id="i_star_to_movie" class="@if($movie->rating >= $i) fa fa-star @else fa fa-star-o @endif" aria-hidden="true"></i>
														</a>
													</li>
												@endfor
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
                                <div class="ribben">
                                    <p>
								        @if($movie->downloaded)
                                            @if($movie->seen)✔@else✘@endif
                                        @else
                                            SOON
                                        @endif
                                    </p>
                                </div>
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
				@include('movies.pagination', ['paginator' => $downloadedMovies])
			</div>
		</div>
		<!-- //movie-browse-agile -->
		<!--body wrapper start-->
		<div class="review-slider">
		 	<h4 class="latest-text">Random Movies</h4>
		   	<div class="container">
				<div class="w3_agile_banner_bottom_grid">
					<div id="owl-demo" class="owl-carousel owl-theme">
						@include('movies.list.carousel', ['movies' => $randomMovies])
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