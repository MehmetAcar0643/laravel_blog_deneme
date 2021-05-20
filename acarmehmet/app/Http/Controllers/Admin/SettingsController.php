<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $data['adminSettings'] = Setting::all()->sortBy('must');
        return view('admin.settings.index', compact('data'));
    }

    public function sortable()
    {
//       return print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $val) {
            $setting = Setting::find(intval($val));
            $setting->must = intval($key);
            $setting->save();
        }
        echo true;
    }

    public function destroy($id)
    {
        $setting = Setting::find($id);
        if ($setting->delete()) {
            return back()->with('success', "Silme İşlemi Başarılı");
        }
        return back()->with('error', "Silme İşlemi Başarısız");
    }


    public function edit($id)
    {
        $settings = Setting::where('id', $id)->first();
        return view('admin.settings.edit')->with("settings", $settings);
    }

    public function update(Request $request, $id)
    {

        if ($request->filled('kapakdata')) {
            $request->validate([
                'file' => 'mimes:jpg,png,jpeg|max:2048'
            ]);
            $image = base64_encode(file_get_contents($request->file('kapakdata')->path()));
            $request->image = $image;
        }


        $settings = Setting::where('id', $id)->update(
            [
                "value" => $request->value
            ]
        );
        if ($settings) {
            return back()->with('success', "Güncelleme Başarılı");
        } else {
            return back()->with('error', "Güncelleme Başarısız");
        }
    }

}
