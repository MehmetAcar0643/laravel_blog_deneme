<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blog'] = Blog::all()->sortBy('must');
        return view("frontend.default.index", compact("data"));
    }

    public function contact()
    {
        return view("frontend.default.contact");
    }

}
