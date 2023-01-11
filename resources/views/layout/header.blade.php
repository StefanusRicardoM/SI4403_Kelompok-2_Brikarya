 <!-- header-start -->
 <header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{route('home')}}">
                                    <img src="img/logo.png" width="180px" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="nav-link" href="{{route('home')}}">home</a></li>
                                        <li><a class="nav-link" href="{{route('freelance')}}">Find Freelance</a></li>
                                        <li><a class="nav-link" href="{{route('job')}}">Browse Job</a></li>
                                        <li><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                                        <li><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        @if(Auth::user() != null)
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    @if(Auth::user()->role == 'admin')
                                        <a class="nav-link font-weight-bold" href="{{route('admin.user')}}">Hello, {{Auth::user()->nama}}</a>
                                    @else
                                        <a class="nav-link font-weight-bold" href="{{route('dashboard.profile')}}">Hello, {{Auth::user()->nama}}</a>
                                    @endif
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="{{route('dashboard.postjob')}}">Post a Job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                        @else
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a class="nav-link" href="{{route('user.login')}}">Login</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="#">Post a Job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->