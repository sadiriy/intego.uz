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
        $logo_white = $request->logo_white;
        $fb_link = $request->fb_link;
        $tg_link = $request->tg_link;
        $wa_link = $request->wa_link;
        $li_link = $request->li_link;

        if ($logo != null && $logo_white != null){

            $imageName = time() . '.' . $logo->extension();
            $logo->move(public_path('img/'), $imageName);

            $imageName_white = time() . '.' . $logo_white->extension();
            $logo_white->move(public_path('img/'), $imageName_white);

            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'logo' => 'img/' . $imageName,
                'logo_white' => 'img/' . $imageName_white,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'wa_link' => $wa_link,
                'li_link' => $li_link
            ]);
        }
        elseif ($logo != null){
            $imageName = time() . '.' . $logo->extension();
            $logo->move(public_path('img/'), $imageName);
            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'logo' => 'img/' . $imageName,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'wa_link' => $wa_link,
                'li_link' => $li_link
            ]);
        }
        elseif ($logo_white != null){
            $imageName_white = time() . '.' . $logo_white->extension();
            $logo_white->move(public_path('img/'), $imageName_white);
            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'logo_white' => 'img/' . $imageName_white,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'wa_link' => $wa_link,
                'li_link' => $li_link
            ]);
        }
        else{
            GeneralSettings::where('id', 1)->update([
                'phone' => $phone,
                'email' => $email,
                'fb_link' => $fb_link,
                'tg_link' => $tg_link,
                'wa_link' => $wa_link,
                'li_link' => $li_link
            ]);
        }

        return redirect()->back();
    }
}
