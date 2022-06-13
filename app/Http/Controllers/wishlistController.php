<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Wishlist;
use Carbon\Carbon;

class wishlistController extends Controller
{
    function wishlist(){
        $wish_products = Wishlist::where('gen_cart_id', Cookie::get('gen_cart_id'))->get();
        return view('fronted.wishlisht', compact('wish_products'));
    }

    function addtowish(Request $request){

        if(Cookie::get('gen_cart_id')) {
            $random_gen_id = Cookie::get('gen_cart_id');
        }
        else{
            $random_gen_id = rand(10000, 20000).time();
            Cookie::queue('gen_cart_id', $random_gen_id, 500);
        }

        // if(Wishlist::where('gen_cart_id', $random_gen_id)->where('product_id', $request->product_id)->where('product_image', $request->product_image)){
        // }
            Wishlist::insert([
                'gen_cart_id'=>$random_gen_id,
                'product_id'=>$request->product_id,
                'product_image'=>$request->product_image,
                'created_at'=>Carbon::now(),
            ]);
        return back();

    }

}
