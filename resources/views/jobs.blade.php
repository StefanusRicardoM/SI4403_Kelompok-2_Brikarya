@extends('layout.app')

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$count}} Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="{{route('job')}}" method="get">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" value="{{request()->keyword}}" name="keyword" placeholder="Search keyword">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="location">
                                                @if(request()->location != null)
                                                <option value="{{request()->location}}">{{request()->location}}</option>
                                                @else
                                                <option value={{null}}>Location</option>
                                                @endif
                                                @foreach($lokasi as $l)
                                                <option value="{{$l['lokasi']}}">{{$l['lokasi']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="category">
                                                @if(request()->category != null)
                                                <option value="{{request()->category}}">{{request()->category}}</option>
                                                @else
                                                <option value={{null}}>Category</option>
                                                @endif
                                                @foreach($tipe_pekerjaan as $tipe)
                                                <option value="{{$tipe['tipe_pekerjaan']}}">{{$tipe['tipe_pekerjaan']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="reset_btn">
                                    <button  class="boxed-btn3 w-100" type="submit">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            @if(count($jobs) == 0)
                            <div class="alert alert-danger">Job tidak tersedia</div>
                            @endif
                            @foreach($jobs as $job)
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            <a href="{{route('job_details', ['id' => $job->id])}}"><h4>{{$job->nama}}</h4></a>
                                            <div class="links_locat d-flex align-items-center text-capitalize">
                                                <div class="location">
                                                    <p> <i class="fa fa-map-marker"></i> {{$job->lokasi}}</p>
                                                </div>
                                                <div class="location">
                                                    <p> <i class="fa fa-clock-o"></i> {{$job->tipe_pekerjaan}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                            <a href="{{route('job_details', ['id' => $job->id])}}" class="boxed-btn3">Apply Now</a>
                                        </div>
                                        <div class="date">
                                            <p>Date line: {{$job->deadline}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pagination_wrap">
                                    <ul>
                                        <li><a href="#"> <i class="ti-angle-left"></i> </a></li>
                                        <li><a href="#"><span>01</span></a></li>
                                        <li><a href="#"><span>02</span></a></li>
                                        <li><a href="#"> <i class="ti-angle-right"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

	<script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 24600,
                values: [ 750, 24600 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] +"/ Year" );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
        } );
        </script>
@endsection