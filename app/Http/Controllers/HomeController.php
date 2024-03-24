<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                $post = Post::where('post_status' , '=', 'active')->get();
                return view('home.homepage', compact('post'));
            }else if($usertype == 'admin'){
                return view('admin.adminhome');
            }else{
                return redirect()->back();
            }
        }

    }
    
    public function homepage(){

        $post = Post::where('post_status' , '=', 'active')->get();
        return view('home.homepage', compact('post'));
    }

    public function post_details($id){
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }

    public function view_create_post(){
        return view('home.create_post');
    }

    public function create_post(Request $request){


        $user = Auth()->user();

        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;
        
        
        // $post->user_id = $user->id; // Assign the user_id from the authenticated user
        
        $post =new Post;
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_type = $usertype;
        $post->name = $name;
        $post->user_id = $user->id;
        $post->post_status = 'active';
        $image = $request->image;


        if ($image) {
            
            $imagename = time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('postimage', $imagename);
    
            $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message', 'Post Added');
    }

    public function my_post(){
        $user = Auth::user();
        $userid = $user->id;
        $data = Post::where('user_id', '=', $userid)->get();

        return view('home.my_post', compact('data'));
    }

    public function delete_post($id){
        $data = Post::find($id);
        $data -> delete();

        return redirect()->back()->with('message', 'post deleted');
    }

    public function update_post($id){
        $post = Post::find($id);
        return view('home.edit_page', compact('post'));
    }

    public function edit_post(Request $request, $id){
        $data = Post::find($id);

                $data -> title = $request->title;
                $data -> description = $request->description;

                $image = $request ->image;

                if ($image) {
            
                    $imagename = time().'.'.$image->getClientOriginalExtension();
            
                    $request->image->move('postimage', $imagename);
            
                    $data->image = $imagename;
                }

                $data -> save();
                return redirect()->back()->with('message', 'Update Success');
    }
}