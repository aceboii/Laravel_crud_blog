@include('admin.header')
    <header class="header">
@include('admin.sidebar')
        <div class="page-content">
            @if (session()->has('message'))

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                {{session()->get('message')}}
            </div>
                
            @endif
            <h1 class='title_design'>All Post</h1>
            <table class="table_design">
                <tr class="th_design">
                    <th>Post title</th>
                    <th>Descriptoin</th>
                    <th>By</th>
                    <th>Status</th>
                    <th>User Type</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>

                @foreach ($post as $post)
                    
                <tr >
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->user_type}}</td>
                    <td>
                        <img src="postimage/{{$post->image}}" class="img_design">
                    </td>
                    <td><a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this??')">Delete</a></td>
                    <td>
                        <a href="{{url('edit_post', $post->id)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure')" href="{{url('accept_post', $post->id)}}" class="btn btn-outline-secondary">Accept</a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure')" href="{{url('reject_post', $post->id)}}" class="btn btn-danger">Reject</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
@include('admin.footer')
