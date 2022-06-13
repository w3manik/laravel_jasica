<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CuponController extends Controller
{
    function cupon(){
        $cupons = Cupon::all();
        return view('admin.cupon.index', compact('cupons'));
    }

    function cuinsert(Request $request){
        Cupon::insert([
            'cupon_name'=>$request->cupon_name,
            'copon_discount'=>$request->copon_discount,
            'copon_valadity'=>$request->copon_valadity,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('cupon', 'Cupon Added Successfully');
    }

}
