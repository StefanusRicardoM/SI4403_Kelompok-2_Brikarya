@extends('layout.app')

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">{{$count}}+ Freelance Ditambahkan</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Berkaryalah di Brikarya</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Tempat Kamu berkarya dengan passion kamu</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="{{route('job')}}" class="boxed-btn3">Upload your Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area -->
    <form action="{{route('job')}}" method="get">
        <div class="catagory_area">
            <div class="container">
                <div class="row cat_search">
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <input type="text" name="keyword" placeholder="Search keyword">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <select class="wide" name="location">
                                <option value={{null}}>Location</option>
                                @foreach($lokasi as $l)
                                <option value="{{$l['lokasi']}}">{{$l['lokasi']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <select class="wide" name="category">
                                <option value={{null}}>Category</option>
                                @foreach($tipe_pekerjaan as $tipe)
                                <option value="{{$tipe['tipe_pekerjaan']}}">{{$tipe['tipe_pekerjaan']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="job_btn">
                            <button type="submit" class="boxed-btn3">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- job_listing_area_start  -->
    <div class="job_listing_area py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="{{route('job')}}" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @foreach($jobs as $job)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="{{route('job_details', ['id' => $job['id']])}}"><h4>{{$job['nama']}}</h4></a>
                                    <div class="links_locat d-flex align-items-center text-capitalize">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{$job['lokasi']}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$job['tipe_pekerjaan']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                    <a href="{{route('job_details', ['id' => $job['id']])}}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>Date line: {{$job['deadline']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Featured Candidates</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/1.png" alt="">
                            </div>
                            <a href="#"><h4>Stefanus Ricardo Mascarenhas</h4></a>
                            <p>Project Manager</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/2.png" alt="">
                            </div>
                            <a href="#"><h4>Rizky Bernawan</h4></a>
                            <p>Front-End Developer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/3.png" alt="">
                            </div>
                            <a href="#"><h4>Fransiscus Michael Patty</h4></a>
                            <p>Back-End Developer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/4.png" alt="">
                            </div>
                            <a href="#"><h4>Muhammad Rafie Wirandra</h4></a>
                            <p>Data Analyst</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/5.png" alt="">
                            </div>
                            <a href="#"><h4>Stevanus Dewangga</h4></a>
                            <p>UI/UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Cari Perkerjaan?</h3>
                        <p>Kami Menyediakan kumpulan pekerjaan yang bisa kamu daftar sekarang juga </p>
                        <a href="{{route('job')}}" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Butuh Tenaga Tambahan?</h3>
                        <p>Kami menyediakan tenaga kerja yang bisa kamu hire sekarang juga </p>
                        <a href="{{route('user.login')}}" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->

    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Saya sangat kesulitan dalam mencari pekerjaan yang sesuai dengan kemampuan dan pengalaman saya, tetapi setelah menggunakan Brikarya, saya berhasil mendapatkan pekerjaan impian saya dalam waktu beberapa minggu saja. Interface yang user-friendly dan alat pencarian yang kuat membuat saya mudah menemukan lowongan kerja yang relevan. Fitur pembuat resume dan template surat lamaran juga sangat membantu. Saya sangat merekomendasikan website ini kepada siapa saja yang sedang mencari pekerjaan baru!"</p>
                                            <span>- Naoval</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class=" Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Saya sangat puas dengan Brikarya dalam mencari pekerjaan. Alat pencarian dan fitur-fitur lainnya sangat membantu dalam menemukan lowongan yang sesuai. Saya segera mendapatkan pekerjaan setelah mendaftar melalui website ini. Sangat direkomendasikan!"</p>
                                            <span>- Naoval</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Melalui Brikarya, saya berhasil menemukan pekerjaan impian saya dengan mudah. Fitur pencarian yang detail dan profesional membuat saya lebih fokus mencari pekerjaan yang sesuai. Saya sangat berterimakasih atas bantuan yang diberikan oleh website ini."</p>
                                            <span>- Naoval</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


 @endsection