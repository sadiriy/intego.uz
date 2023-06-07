<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateImages;
use Illuminate\Http\Request;

class CertificateImagesController extends Controller
{
    public function index($certificate){
        $certificateImages = CertificateImages::where('certificate_id', $certificate)->get();

        return view('back/certificateImages')->with([
            'certificateImages' => $certificateImages,
            'certificate_id' => $certificate
        ]);
    }

    public function upload(Request $request, $certificate_id){
        $image = $request['image'];
        if ($image != null){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/certificateImages/'), $imageName);
        }
        $path = 'img/certificateImages/' . $imageName;

        CertificateImages::create([
            'certificate_id' => $certificate_id,
            'path' => $path
        ]);

        return redirect()->route('certificateImages.admin', $certificate_id);
    }

    public function delete(CertificateImages $certificateImage){
        $certificate_id = $certificateImage->certificate_id;
        $certificateImage->delete();
        return redirect()->route('certificateImages.admin', $certificate_id);
    }
}
