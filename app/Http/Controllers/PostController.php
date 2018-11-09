<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//Menampilkan Index
    {
        $posts = Post::paginate(3);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//Menampilkan Form Tambah
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Insert database
    {
        // $this->validate($request, [
        //     'title'=>'required|max:255'
        //     'body'=>'required']); Opsi lain model array
        //Validate the data
        $this->validate($request, array(

            'title'=>'required|max:255',
            'body'=>'required'
        )); 
        // Store in the Database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = $request->body; 

        $post->save();

        Session::flash('success', 'The blog was successfully save!!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Select / menampilkan
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//Form Edit
    {
        //find the post in the database and save as a var
        $post = Post::find($id);
        //return the view and pass in the var we previously created
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Ubah Data
    {
        // validate the database
        $post = Post::find($id); 
        if ($request->input('slug') == $post->slug) {
               $this->validate($request, array(

                'title'=>'required|max:255',
                'body'=>'required'
            )); 
        } else {
                $this->validate($request, array(

                'title'=>'required|max:255',
                'slug'=>'required|min:5|max:255|alpha_dash|unique:posts,slug',
                'body'=>'required'
            )); 
        }
        
      // save the data to the database
        $post = Post::find($id); 

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();
        // set flash data with success message
        Session::flash('success', 'The blog was successfully save!!');
        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Hapus Data
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted');

        return redirect()->route('posts.index');
    }
}
