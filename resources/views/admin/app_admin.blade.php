@extends('layout.app')

@section('content')
  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Dashboard Admin</h3>
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
                    <a href="{{route('admin.user')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "admin.user" ? 'text-white rounded bg-primary' : '' }} {{ \Request::route()->getName() == "admin.user.edit" ? 'text-white rounded bg-primary' : '' }}">User</a>
                    <a href="{{route('admin.blog')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "admin.blog" ? 'text-white rounded bg-primary' : '' }} {{ \Request::route()->getName() == "admin.blog.edit" ? 'text-white rounded bg-primary' : '' }}">Blog</a>
                    <a href="{{route('admin.job')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "admin.job" ? 'text-white rounded bg-primary' : '' }} {{ \Request::route()->getName() == "admin.job.edit" ? 'text-white rounded bg-primary' : '' }}">Job</a>
                    <a href="{{route('admin.freelance')}}" class="p-2 fs-5 my-2 {{ \Request::route()->getName() == "admin.freelance" ? 'text-white rounded bg-primary' : '' }} {{ \Request::route()->getName() == "admin.freelance.edit" ? 'text-white rounded bg-primary' : '' }}">Freelance</a>
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
