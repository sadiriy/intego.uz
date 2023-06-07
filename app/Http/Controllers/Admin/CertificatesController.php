<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateImages;
use App\Models\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function index(){
        $certificates = Certificates::all();

        return view('front/certificates')->with([
            'certificates' => $certificates
        ]);
    }

    public function single(Certificates $certificate){
        $certificateImages = CertificateImages::where('certificate_id', $certificate->id)->get();
        return view('front/certificate')->with([
            'certificate' => $certificate,
            'certificateImages' => $certificateImages
        ]);
    }

    public function list(){
        $certificates = Certificates::all();

        return view('back/certificates')->with([
            'certificates' => $certificates
        ]);
    }

    public function upload(Request $request){
        $name = $request['name'];
        $image = $request['image'];
        $text_ru = $request['text_ru'];
        $text_en = $request['text_en'];
        $text_uz = $request['text_uz'];
        $text_tr = $request['text_tr'];
        $text_ar = $request['text_ar'];
        if ($image != null){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/certificates/'), $imageName);
        }
        $path = 'img/certificates/' . $imageName;

        Certificates::create([
           'name' => $name,
           'path' => $path,
           'text_ru' => $text_ru,
           'text_en' => $text_en,
           'text_uz' => $text_uz,
           'text_tr' => $text_tr,
           'text_ar' => $text_ar,
        ]);

        return redirect()->route('certificates.admin');
    }

    public function delete(Certificates $certificate){
        CertificateImages::where('certificate_id', $certificate->id)->delete();
        $certificate->delete();
        return redirect()->route('certificates.admin');
    }
}
