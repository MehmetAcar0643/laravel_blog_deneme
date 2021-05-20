<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
        return view('admin.default.index');
    }


    public function login()
    {
        return view('admin.default.login');
    }


    public function authenticate(Request $request)
    {
        //formda email kısmına value ye old ekledik. Emailin silinmemsini orada kalmasını sağlıyor.
        $request->flash();
        $remember_me = $request->has('remember_me') ? true : false;

        //Formdan gelen verilerden sadece seçilenleri al.
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->intended(route('admin.index'));
        } else {
            return back()->with("error", "Girdiğiniz Bilgiler Hatalı !!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'))->with('success','Güvenli Çıkış yapıldı...');
    }

}
