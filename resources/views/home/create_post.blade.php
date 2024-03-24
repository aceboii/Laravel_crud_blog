<base href="/public">

@include('home.homeHeadercss')
<!-- header section start -->
<div class="header_section">
    <div class="header_main">
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


<div class="page-content">
    @if (@session()->has('message'))

    <div class="alert alert-success">
        <button type="button" data-dismiss="alert" aria-hidden='true' class="close">X</button>
        {{session()->get('message')}}
    </div>
        
    @endif
    <h1 class="post_title">Add Post</h1>

    <div>
        <form action="{{url('create_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">
                <label>Post Title</label>
                <input type="text" name="title">
            </div>
            <div class="div_center">
                <label>Description</label>
                <textarea name="description"  cols="30" rows="10"></textarea>
            </div>
            <div class="div_center">
                <label>Add Image</label>
                <input type="file" name="image">
            </div>
            <div class="div_center_btn">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>


    
</div>


@include('home.homeFooter')