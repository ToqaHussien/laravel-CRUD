<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //view All Posts
    function allPosts(){
        $posts = Post::get();
        // dd($posts);
        return view('all-posts' , [
            'posts' => $posts
        ]);
    }


    function show($id){
        $posts = Post::where('id','=',$id)->first();
        return view('show' , [
            'posts' =>$posts
        ]  );
    }

    function create(){
        return view('create');
    }


    function store(Request $request){

        $validator = \Validator::make($request->all() , [
            'title' => 'required|max:100|min:6',
            'desc' => 'required|max:100|min:10',
            'content' => 'required|max:255|min:15',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);

        if($validator->fails()){
            return redirect('/posts/create')
            ->withErrors($validator)
            ->withInput();

        }


        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'_'.\Str::random(25).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath , $name);
            $imageName = 'images/'.$name;
        }   

        $post = new Post();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->content = $request->content;
        if(isset($request->image)){
            $post->image = $imageName;
        }
        
        $post->save();

        return redirect('/posts/all-posts');
        
        
    }


    function edit($id){

        $posts = Post::find($id);
        return view('edit' , [
            'posts' => $posts
        ]);

    }

    function update($id , Request $request){


        
        $validator = \Validator::make($request->all() , [
            'title' => 'required|max:100|min:6',
            'desc' => 'required|max:100|min:10',
            'content' => 'required|max:255|min:15',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);

        if($validator->fails()){
            return redirect('/posts/edit/'.$id)
            ->withErrors($validator)
            ->withInput();

        }




        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->desc = $request->desc;
        $posts->content = $request->content;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'_'.\Str::random(25).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath , $name);
            $imageName = 'images/'.$name;
            if( isset($posts->image )){
                
                unlink($posts->image );
            }
            
            $posts->image = $imageName;
        }  


        $posts->save();
        return redirect('posts/show/'.$id);
    }



    function delete($id){
    $posts = Post::find($id);
        if(isset($posts->image))
        unlink($posts->image);
        $posts->delete();
        return redirect('/posts/all-posts');
    }
}
