<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data['blog']=Blog::all()->sortBy('must');
        return view("frontend.blog.index",compact("data"));
    }


    public function detail($slug){
        $blogList=Blog::all()->sortBy('must');
        $blog=Blog::where('slug',$slug)->first();
        return view('frontend.blog.detail',compact("blog","blogList"));
    }
}
