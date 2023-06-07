<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(){
        $calculations = Calculation::all();

        return view('back/calculations')->with([
            'calculations' => $calculations,
        ]);
    }

    public function activate(Calculation $calculation){
        if ($calculation->is_checked == 0) {
            Calculation::findOrFail($calculation->id)->update([
                'is_checked' => 1
            ]);
        } else {
            Calculation::findOrFail($calculation->id)->update([
                'is_checked' => 0
            ]);
        }

        return redirect()->route('calculations.index');
    }
}
