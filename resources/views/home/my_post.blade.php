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
</div>



@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>
@endif



@foreach($data as $data)
<div class="post_design">
    <img class="image_design" src="/postimage/{{$data->image}}" alt="">
    <h4 class="title_design">{{$data->title}}</h4>
    <p class="des_design">{{$data->description}}</p>
    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('delete_post', $data->id)}}" class="btn btn-danger">Delete</a>
    <a href="{{url('update_post', $data->id)}}" class="btn btn-primary">Update</a>
</div>

@endforeach


@include('home.homeFooter')
