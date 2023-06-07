<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListRequestController extends Controller
{
    public function index(){
        $priceList = PriceList::with('category')->get();

        return view('back/price-list-request')->with([
            'PriceListRequests' => $priceList,
        ]);
    }

    public function activate(PriceList $priceListRequest){
        if ($priceListRequest->is_checked == 0) {
            PriceList::findOrFail($priceListRequest->id)->update([
                'is_checked' => 1
            ]);
        } else {
            PriceList::findOrFail($priceListRequest->id)->update([
                'is_checked' => 0
            ]);
        }

        return redirect()->route('priceListRequests.index');
    }
}
