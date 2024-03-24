@include('home.homeHeadercss')
<!-- header section start -->
<div class="header_section">
    <div class="header_main">
        <div class="mobile_menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
            <div class="menu_main">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    @if (Route::has('login'))
                        @auth

                            <li>
                                <x-app-layout>
                                </x-app-layout>
                            </li>
                            <li><a href="{{url('my_post')}}">My post</a></li>
                            <li><a href="{{url('create_post')}}">Create Post</a></li>

                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="banner_taital">Adventure</h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have sufferedThere are ma available, but the majority have suffered</p>
                        <div class="read_bt"><a href="#">Get A Quote</a></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="banner_taital">Adventure</h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have sufferedThere are ma available, but the majority have suffered</p>
                        <div class="read_bt"><a href="#">Get A Quote</a></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="banner_taital">Adventure</h1>
                        <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have sufferedThere are ma available, but the majority have suffered</p>
                        <div class="read_bt"><a href="#">Get A Quote</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->
</div>
<!-- header section end -->

<!-- services section start -->
<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Post </h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration</p>
        <div class="services_section_2">
            <div class="row">

                @foreach ($post as $post)
                
                <div class="col-md-4" style="padding:30px;">
                    <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
                    <h4>{{$post->title}}</h4>

                    <p>Post by <b>{{$post->name}}</b></p>
                    <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- services section end -->

<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="about_taital_main">
                    <h1 class="about_taital">About Us</h1>
                    <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or randomised words which
                        don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need
                        to be sure there isn't anything embarrassing hidden in the middle of text. All </p>
                    <div class="readmore_bt"><a href="#">Read More</a></div>
                </div>
            </div>
            <div class="col-md-6 padding_right_0">
                <div><img src="images/about-img.png" class="about_img"></div>
            </div>
        </div>
    </div>
</div>
<!-- about section end -->

<!-- choose section start -->
<div class="choose_section layout_padding">
    <div class="container">
        <h1 class="choose_taital">Why Choose Us</h1>
        <p class="choose_text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
            embarrassing hidden in the middle of text. All </p>
        <div class="read_bt_1"><a href="#">Read More</a></div>
        <div class="newsletter_box">
            <h1 class="let_text">Let Start Talk with Us</h1>
            <div class="getquote_bt"><a href="#">Get A Quote</a></div>
        </div>
    </div>
</div>
<!-- choose section end -->

@include('home.homeFooter')
