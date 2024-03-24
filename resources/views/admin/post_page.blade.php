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
            <h1 class="post_title">Add Post</h1>

            <div>
                <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>


            
        </div>

@include('admin.footer')
