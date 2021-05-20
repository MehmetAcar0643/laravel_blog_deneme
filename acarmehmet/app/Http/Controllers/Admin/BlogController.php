<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = Blog::all()->sortBy('must');
        return view("admin.blogs.index", compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'mimes:jpg,png,jpeg|max:2048'
        ]);
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->title);
        }

        $blog = Blog::insert(
            [
                "title" => $request->title,
                "slug" => $slug,
                "file" => $request->kapakdata,
                "description" => $request->description,
            ]
        );

        if ($blog) {
            //Yönlendirme methodu
            return redirect(route('blog.index'))->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = Blog::Where('id', $id)->first();
        return view("admin.blogs.edit")->with("blog", $blogs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'mimes:jpg,png,jpeg|max:2048'
        ]);
        if (strlen($request->slug) > 3) {
            $slug = Str::slug($request->slug);
        } else {
            $slug = Str::slug($request->title);
        }

        $blog = Blog::Where('id',$id)->update(
            [
                "title" => $request->title,
                "slug" => $slug,
                "file" => $request->kapakdata,
                "description" => $request->description,
            ]
        );

        if ($blog) {
            //Yönlendirme methodu
            return back()->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find(intval($id));
        $sil = $blog->delete();
        if ($sil) {
            echo 1;
        } else {
            echo 0;
        }
    }


    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $blog = Blog::find(intval($value));
            $blog->must = intval($key);
            $blog->save();
        }
        echo true;
    }


    public function switchSatatus(Request $request){
        $blog=Blog::find($request->id);
        $blog->status=$request->status;
        $blog->save();
        if($blog){
            return 1;
        }else return 0;
    }

}
