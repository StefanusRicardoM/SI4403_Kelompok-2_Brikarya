@extends('layout.app')

@section('content')

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$job['nama']}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent text-capitalize">
                                    <a href="{{route('job_details', ['id' => $job['id']])}}"><h4>{{$job['nama']}}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
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
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$job['deskripsi']}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <p>{{$job['tanggungjawab']}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <p>{{$job['kualifikasi']}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>{{$job['benefit']}}</p>
                        </div>
                    </div>
                    <div class="apply_job_form white-bg">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        @if (Session::has('error'))
                            <div id="error" class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <h4>Apply for the job</h4>
                        <form action="{{route('apply.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{$job['id']}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" name='nama'  value="{{old('nama')}}" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="email" name='email' value="{{old('email')}}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text"  name='link' value="{{old('link')}}" placeholder="Website/Portfolio link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload CV</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" name="cv" class="" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="coverletter" id="" cols="30" rows="10" placeholder="Coverletter">{{old('coverletter')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul class="text-capitalize">
                                <li>Published on: <span>{{\Carbon\Carbon::parse($job['created_at'])->format('d/m/Y')}}</span></li>
                                <li>Vacancy: <span>{{$job['lowongan']}} Posisi</span></li>
                                <li>Salary: <span>Rp.{{number_format($job['gaji'])}}/bulan</span></li>
                                <li>Location: <span>{{$job['lokasi']}}</span></li>
                                <li>Job Nature: <span> {{$job['tipe_pekerjaan']}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection