<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex(){
    	$posts = Post::orderBy('id','desc')->paginate(3);
    	return view('pages.home', compact('posts'));
    }

     public function getContact(){
    	return view('pages.contact');
    }

     public function getAbout(){
    	return view('pages.about');
    }
}
