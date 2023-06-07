<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainPageNumbers;
use App\Models\MainPagePrivileges;
use App\Models\MainPageSliders;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $main_page_numbers = MainPageNumbers::all();
        $main_page_privileges = MainPagePrivileges::all();

        return view('back/mainpage')->with([
            'numbers' => $main_page_numbers,
            'privileges' => $main_page_privileges
        ]);
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

    public function store(Request $request)
    {
        if ($request->type == 'number'){
            $id = $request->id;
            $number = $request->number;
            $unit_ru = $request->unit_ru;
            $unit_en = $request->unit_en;
            $unit_uz = $request->unit_uz;
            $unit_tr = $request->unit_tr;
            $unit_ar = $request->unit_ar;
            $text_ru = $request->text_ru;
            $text_en = $request->text_en;
            $text_uz = $request->text_uz;
            $text_tr = $request->text_tr;
            $text_ar = $request->text_ar;

            MainPageNumbers::where('id', $id)->update([
                'number' => $number,
                'unit_ru' => $unit_ru,
                'unit_en' => $unit_en,
                'unit_uz' => $unit_uz,
                'unit_tr' => $unit_tr,
                'unit_ar' => $unit_ar,
                'text_ru' => $text_ru,
                'text_en' => $text_en,
                'text_uz' => $text_uz,
                'text_tr' => $text_tr,
                'text_ar' => $text_ar
            ]);

        }
        elseif ($request->type == 'privilege'){
            $id = $request->id;
            $icon = $request->icon;
            $text_ru = $request->text_ru;
            $text_en = $request->text_en;
            $text_uz = $request->text_uz;
            $text_tr = $request->text_tr;
            $text_ar = $request->text_ar;

            if ($icon != null){
                $iconName = time() . '.' . $icon->extension();
                $icon->move(public_path('img/privileges/'), $iconName);

                MainPagePrivileges::where('id', $id)->update([
                    'icon' => '/privileges/' . $iconName,
                    'text_ru' => $text_ru,
                    'text_en' => $text_en,
                    'text_uz' => $text_uz,
                    'text_tr' => $text_tr,
                    'text_ar' => $text_ar
                ]);
            }
            else{
                MainPagePrivileges::where('id', $id)->update([
                    'text_ru' => $text_ru,
                    'text_en' => $text_en,
                    'text_uz' => $text_uz,
                    'text_tr' => $text_tr,
                    'text_ar' => $text_ar
                ]);
            }


        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
