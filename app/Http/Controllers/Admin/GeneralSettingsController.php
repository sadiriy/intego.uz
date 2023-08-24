<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function index(){
        $general = GeneralSettings::firstOrFail();

        return view('back/general')->with([
            'general' => $general,
        ]);
    }

    public function store(Request $request){
        $phone = $request->phone;
        $email = $request->email;
        $logo = $request->logo;
        $fb_link = $request->fb_link;
        $tg_link = $request->tg_link;
        $in_link = $request->in_link;

        if ($logo != null){
            $imageName = time() . '.' . $logo->extension();
            $logo->move(public_path('img/'), $imageName);

            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'logo' => 'img/' . $imageName,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'in_link' => $in_link
            ]);
        }
        else{
            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'in_link' => $in_link
            ]);
        }

        return redirect()->back()->with('success', 'Настройки успешно сохранены');
    }
}
