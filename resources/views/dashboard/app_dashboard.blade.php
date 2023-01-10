@extends('layout.app')

@section('content')
  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<div class="text-black">
    <div class="container pb-4">
        <div class="d-flex mt-5">
            <div class="col-3">
                <div class="d-flex flex-column mb-3">
                    <a href="{{route('dashboard.profile')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.profile" ? 'text-white rounded bg-primary' : '' }}">Profile</a>
                    <a href="{{route('dashboard.job')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.job" ? 'text-white rounded bg-primary' : '' }}">Your Job Application</a>
                    <a href="{{route('dashboard.freelance')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.freelance" ? 'text-white rounded bg-primary' : '' }}">Your Freelance</a>
                    <a href="{{route('dashboard.postjob')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.postjob" ? 'text-white rounded bg-primary' : '' }}">Post Job</a>
                    <a href="{{route('dashboard.postblog')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.postblog" ? 'text-white rounded bg-primary' : '' }}">Post Blog</a>
                    <a href="{{route('dashboard.jobsubmit')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.jobsubmit" ? 'text-white rounded bg-primary' : '' }}">Job Submission</a>
                    <a href="{{route('dashboard.freelancesubmit')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "dashboard.freelancesubmit" ? 'text-white rounded bg-primary' : '' }}">Freelance Submission</a>
                    <a href="{{route('user.logout')}}" class="p-2 fs-5 my-2">Logout</a>
                </div>
            </div>
            <div class="col-9">
                @yield('dashboard_profile')
            </div>
        </div>
    </div>
</div>
@endsection
