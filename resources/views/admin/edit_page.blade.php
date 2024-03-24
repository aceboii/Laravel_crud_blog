<base href="/public">
@include('admin.header')
    <header class="header">
@include('admin.sidebar')

        <div class="page-content">
            @if (@session()->has('message'))

            <div class="alert alert-success">
                <button type="button" data-dismiss="alert" aria-hidden='true' class="close">X</button>
                {{session()->get('message')}}
            </div>
                
            @endif
            <h1 class="post_title">Edit Post</h1>

            <div>
                <form action="{{url('edit_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label>Post Title</label>
                        <input type="text" value="{{$post->title}}" name="title">
                    </div>
                    <div class="div_center">
                        <label>Description</label>
                        <textarea name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="div_center">
                        <label>Old Image</label>
                        <img style="margin: auto;" height="100px" width="150px" src="/postimage/{{$post->image}}">
                    </div>
                    <div class="div_center">
                        <label>Update Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="div_center">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div> 
                </form>
            </div>


            
        </div>

@include('admin.footer')
