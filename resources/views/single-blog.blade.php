@extends('layout.app')

@section('content')

  <!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>single blog</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="img/blog/single_blog_1.png" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$blog->judul}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> {{$blog->kategori}}</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> {{$count}} Comments</a></li>
                     </ul>
                     <p class="excert">
                        {{$blog->isi}}
                     </p>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <div class="media-body">
                        <a href="#">
                           <h4>{{$blog->nama}}</h4>
                        </a>
                        <p>User</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>{{$count}} Comments</h4>
                  @foreach($komentar as $k)
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="img/comment/comment_1.png" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                 {{$k->komentar}}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       {{$k->nama}}
                                    </h5>
                                    <p class="date">
                                    {{\Carbon\Carbon::parse($k->created_at)->format('F d, Y')}} at 
                                    {{\Carbon\Carbon::parse($k->created_at)->format('h:i A')}}
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="comment-form">
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
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" method="POST" action="{{route('blog.comment', ['id' => $blog->id])}}" id="commentForm">
                     @csrf
                     @method('POST')
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="komentar" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="nama" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                     @foreach($recent as $recent)
                     <div class="media post_item">
                        <img src="/storage/images/{{$recent['gambar']}}" style="width: 20%" alt="post">
                        <div class="media-body">
                           <a href="{{route('blog', ['id' => $recent['id']])}}">
                              <h3>{{$recent['judul']}}</h3>
                           </a>
                           <p>
                              {{\Carbon\Carbon::parse($recent['created_at'])->format('F d, Y')}}
                           </p>
                        </div>
                     </div>
                     @endforeach
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

@endsection