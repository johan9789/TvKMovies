@foreach($movies as $index => $movie)
    <div class="col-md-2 w3l-movie-gride-agile">
        <a href="{{ $movie->trailer_url }}" class="hvr-shutter-out-horizontal" @if($movie->trailer_url)target="_blank"@endif>
            <img src="{{ URL::asset(config('paths.MOVIE_COVER').$movie->cover) }}" title="{{ $movie->other_name }}" alt=" " class="img-responsive" width="182" height="268">
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
        <div class="ribben" id="update_movie_status" data-current-status="{{ $movie->status }}" data-movie-id="{{ $movie->id }}" style="cursor: pointer;">
            <p>{{ $movie->status }}</p>
        </div>
    </div>
    @if(($index + 1) % 6 == 0)
        <div class="clearfix"></div>
    @endif
@endforeach
