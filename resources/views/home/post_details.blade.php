<base href="/public">

@include('home.homeHeadercss')
<!-- header section start -->
<div class="header_section">
    <div class="header_main">
        <div class="container-fluid">
            <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
            <div class="menu_main">
                <ul>
                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    @if (Route::has('login'))
                        @auth

                            <li>
                                <x-app-layout>
                                </x-app-layout>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>


   <div style="text-align: center;">
    <div style="display: inline-block;">
        <img style="padding: 20px; height: 400px; width: 550px;" src="/postimage/{{$post->image}}" class="services_img">
        <h4><b>{{$post->title}}</b></h4>
        <h4>{{$post->description}}</h4>
        <p>Post by <b>{{$post->name}}</b></p>
    </div>
</div>



@include('home.homeFooter')
