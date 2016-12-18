@extends('layout')

@section('content')

<!-- banner -->
<div id="slidey" style="display: none;">
	<ul>
        @foreach($nextReleases as $movie)
            <li>
                <img src="{{ URL::asset('images/covers/movies/big/'.$movie->big_cover) }}" alt=" ">
                <p class='title'>{{ $movie->name }}</p>
                <p class='description'> {{ $movie->synopsis }}</p>
            </li>
        @endforeach
	</ul>
</div>

<script src="{{ URL::asset('js/jquery.slidey.js') }}"></script>
<script src="{{ URL::asset('js/jquery.dotdotdot.min.js') }}"></script>
<script type="text/javascript">
$("#slidey").slidey({
	interval: 8000,
	listCount: 5,
	autoplay: false,
	showList: true
});

$(".slidey-list-description").dotdotdot();
</script>
<!-- //banner -->

<!-- banner-bottom -->
<div class="banner-bottom">
	<div class="container">
		<div class="w3_agile_banner_bottom_grid">
			<div id="owl-demo" class="owl-carousel owl-theme">
				@foreach($lastMovies as $movie)
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
								<img src="images/covers/movies/{{ $movie->cover }}" title="{{ $movie->other_name }}" class="img-responsive" alt="">
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="#">{{ $movie->name }}</a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
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
	</div>
</div>
<!-- //banner-bottom -->

<!-- general -->
<div class="general">
	<h4 class="latest-text w3_latest_text">Featured Movies</h4>
	<div class="container">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Soon</a></li>
				<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Pending</a></li>
				<li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>
				<li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Downloaded</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    @foreach($soonMovies as $index => $movie)
                        <div class="w3_agile_featured_movies">
                            <div class="col-md-2 w3l-movie-gride-agile">
								<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
                                    <img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " class="img-responsive" width="182" height="268">
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="#">{{ $movie->name }}</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
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
                                <div class="ribben"><p>SOON</p></div>
                            </div>
                        </div>
                        @if(($index + 1) % 6 == 0)
                            <div class="clearfix"></div>
                        @endif
                    @endforeach
				</div>
				<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
					@foreach($pendingMovies as $index => $movie)
                        <div class="col-md-2 w3l-movie-gride-agile">
							<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
                                <img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " class="img-responsive" width="182" height="268">
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="#">{{ $movie->name }}</a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
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
                            <div class="ribben"><p>✘</p></div>
                        </div>
                        @if(($index + 1) % 6 == 0)
                            <div class="clearfix"></div>
                        @endif
                    @endforeach
				</div>
				<div role="tabpanel" class="tab-pane fade" id="rating" aria-labelledby="rating-tab">
					@foreach($topRatedMovies as $index => $movie)
						<div class="col-md-2 w3l-movie-gride-agile">
							<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
								<img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " class="img-responsive" width="182" height="268">
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="#">{{ $movie->name }}</a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
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
				<div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">
					@foreach($recentlyDownloadedMovies as $index => $movie)
						<div class="col-md-2 w3l-movie-gride-agile">
							<a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
								<img src="{{ URL::asset('images/covers/movies/'.$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " class="img-responsive" width="182" height="268">
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="#">{{ $movie->name }}</a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>2016</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											@for($i=1;$i<=5;$i++)
												<li>
													<a href="#" id="star_to_movie" data-id="{{ $movie->id }}" data-qualification="{{ $i }}">
														<i class="@if($movie->rating >= $i) fa fa-star @else fa fa-star-o @endif" aria-hidden="true"></i>
													</a>
												</li>
											@endfor
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
	</div>
</div>
<!-- //general -->

<!-- Latest-tv-series -->
<!--
<div class="Latest-tv-series">
	<h4 class="latest-text w3_latest_text w3_home_popular">Most Popular Movies</h4>
	<div class="container">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<div class="agile_tv_series_grid">
							<div class="col-md-6 agile_tv_series_grid_left">
								<div class="w3ls_market_video_grid1">
									<img src="images/h1-1.jpg" alt=" " class="img-responsive" />
									<a class="w3_play_icon" href="#small-dialog">
										<span class="fa fa-play-circle" aria-hidden="true"></span>
									</a>
								</div>
							</div>
							<div class="col-md-6 agile_tv_series_grid_right">
								<p class="fexi_header">the conjuring 2</p>
								<p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span> 720p,Bluray HD Free Movie Downloads, Watch Free Movies Online with high speed Free Movie Streaming | MyDownloadTube Lorraine and Ed Warren go to north London to help a single...</p>
								<p class="fexi_header_para"><span>Date of Release<label>:</label></span> Jun 10, 2016 </p>
								<p class="fexi_header_para">
									<span>Genres<label>:</label> </span>
									<a href="genres.html">Drama</a> |
									<a href="genres.html">Adventure</a> |
									<a href="genres.html">Family</a>
								</p>
								<p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
								</p>
							</div>
							<div class="clearfix"> </div>
							<div class="agileinfo_flexislider_grids">
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m22.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Assassin's Creed 3</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Bad Moms</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Central Intelligence</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Light B/t Oceans</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">X-Men</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Peter</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</li>
					<li>
						<div class="agile_tv_series_grid">
							<div class="col-md-6 agile_tv_series_grid_left">
								<div class="w3ls_market_video_grid1">
									<img src="images/h2-1.jpg" alt=" " class="img-responsive" />
									<a class="w3_play_icon1" href="#small-dialog1">
										<span class="fa fa-play-circle" aria-hidden="true"></span>
									</a>
								</div>
							</div>
							<div class="col-md-6 agile_tv_series_grid_right">
								<p class="fexi_header">a haunting in cawdor</p>
								<p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span> Vivian Miller, sent to a rehabilitation programme for young offenders, where a theatre camp is used as an alternative to jail time. After she views tape ...</p>
								<p class="fexi_header_para"><span>Date of Release<label>:</label></span> Oct 09, 2015 </p>
								<p class="fexi_header_para">
									<span>Genres<label>:</label> </span>
									<a href="genres.html">Thriller</a> |
									<a href="genres.html">Horror</a>
								</p>
								<p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
								</p>
							</div>
							<div class="clearfix"> </div>
							<div class="agileinfo_flexislider_grids">
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Bad Moms</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Central Intelligence</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Light B/t Oceans</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">X-Men</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Peter</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m21.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">The Jungle Book</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</li>
					<li>
						<div class="agile_tv_series_grid">
							<div class="col-md-6 agile_tv_series_grid_left">
								<div class="w3ls_market_video_grid1">
									<img src="images/h3-1.jpg" alt=" " class="img-responsive" />
									<a class="w3_play_icon2" href="#small-dialog2">
										<span class="fa fa-play-circle" aria-hidden="true"></span>
									</a>
								</div>
							</div>
							<div class="col-md-6 agile_tv_series_grid_right">
								<p class="fexi_header">civil war captain America</p>
								<p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span> After the Avengers leaves some&nbsp;collateral damage, political pressure mounts to install a system of accountability.&nbsp;The new status quo deeply divides ...</p>
								<p class="fexi_header_para"><span>Date of Release<label>:</label></span> May 06, 2016 </p>
								<p class="fexi_header_para">
									<span>Genres<label>:</label> </span>
									<a href="genres.html">Action</a> |
									<a href="genres.html">Adventure</a>
								</p>
								<p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
								</p>
							</div>
							<div class="clearfix"> </div>
							<div class="agileinfo_flexislider_grids">
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Bad Moms</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Central Intelligence</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Light B/t Oceans</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
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
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">X-Men</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">Peter</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m20.jpg" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text">
											<h6><a href="single.html">The Secret Life of Pets</a></h6>
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
        </script>
	</div>
</div>
-->

<!-- pop-up-box -->
<!-- <script src="{{ URL::asset('js/jquery.magnific-popup.js') }}" type="text/javascript"></script> -->
<!--//pop-up-box -->
<!--
<div id="small-dialog" class="mfp-hide">
	<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
</div>
<div id="small-dialog1" class="mfp-hide">
	<iframe src="https://player.vimeo.com/video/148284736"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
	<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
$(document).ready(function() {
	$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
});
</script>
-->
<!-- //Latest-tv-series -->

@endsection