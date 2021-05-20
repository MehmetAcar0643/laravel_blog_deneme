<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profil=User::Where('id',$id)->first();
        return view("admin.default.profil")->with("profil",$profil);
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

        if($request->filled('password')){
            $request->validate([
                'name' => 'required',
                'mail' => 'required|email',
                'password'=>'min:6'
            ]);
            $user=User::Where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->mail,
                'password'=>Hash::make($request->password)
            ]);
        }
        else{
            $request->validate([
                'name' => 'required',
                'mail' => 'required|email',
            ]);
            $user=User::Where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->mail,
            ]);
        }

        if ($user) {
            return back()->with('success', 'Bilgiler Güncellendi');
        }
        return back()->with('error', 'Bilgiler Güncellenemedi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
