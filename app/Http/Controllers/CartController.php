<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Cart;
use App\Models\Cupon;
use App\Models\country;
use App\Models\order;
use App\Models\order_beling_details;
use App\Models\orpder_product_details;
use App\Models\city;
use App\Models\product;
use Carbon\Carbon;
use Auth;
use Mail;
use App\Mail\sendinvoice;

class CartController extends Controller
{
    function addtocart(Request $request){

        if(Cookie::get('gen_cart_id')){
            $random_gen_id = Cookie::get('gen_cart_id');
        }
        else{
            $random_gen_id = rand(1000,20000).time();
            Cookie::queue('gen_cart_id', $random_gen_id, 500);
        }

        if(Cart::where('gen_cart_id', $random_gen_id)->where('product_id', $request->product_id)->increment('product_quentity', $request->product_quentity)){
        }
        else{
            Cart::insert([
                'gen_cart_id'=>$random_gen_id,
                'product_id'=>$request->product_id,
                'product_quentity'=>$request->product_quentity,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back();
    }


    function cartdelete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cart($cupon_name = ''){

        if($cupon_name == ''){
            $discount = 0;
        }
        else{
            if(Cupon::where('cupon_name', $cupon_name)->exists()){
                if(Carbon::now()->format('Y-m-d') > Cupon::where('cupon_name', $cupon_name)->first()->copon_valadity){
                    return back()->with('cupon_epaired', 'Cupon Expaired');
                }
                else{
                    $discount = Cupon::where('cupon_name', $cupon_name)->first()->copon_discount;
                }
            }
            else{
                return back()->with('cupon_invalid', 'Cupon Invalid');
            }
        }


        $cart_info = Cart::where('gen_cart_id', Cookie::get('gen_cart_id'))->get();
        return view('fronted.cart', compact('cart_info', 'cupon_name', 'discount'));
    }

    function cartupdate(Request $request){
        foreach($request->product_quentity as $cart_id=>$product_quentity){
            cart::find($cart_id)->update([
                'product_quentity'=>$product_quentity,
            ]);
        }
        return back();
    }


    //checkout

    function checkout(){
        $countries = country::select('id', 'name')->get();
        return view('fronted.checkout', compact('countries'));
    }


    function getcitylist(Request $request){
        $cities = city::where('country_id', $request->country_id)->get();
        $str_to_send = "<option value=''>--select country--</option>";

        foreach($cities as $cityname){
            $str_to_send .= "<option value='".$cityname->id."'>".$cityname->name."</option>";
        }
        echo $str_to_send;
    }

    //order
    function order(Request $request){

        if($request->payment_method == 1 || $request->payment_method == 2){
            $order_id = order::insertGetId([
                'user_id'=>Auth::id(),
                // 'product_id'=>session('product_id'),
                'total'=>session('total_from_cart'),
                'discount'=>session('discount_from_cart'),
                'subtotal'=>session('total_from_cart') - session('discount_from_cart'),
                'payment_method'=>$request->payment_method,
                // 'product_quentity'=>$request->product_quentity,
                'phone'=>$request->phone,
                'created_at'=>Carbon::now(),
            ]);

            order_beling_details::insert([
                'order_id'=>$order_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'country_id'=>$request->country_id,
                'city_id'=>$request->city_id,
                'adress'=>$request->adress,
                'postcode'=>$request->postcode,
                'notes'=>$request->notes,
                'created_at'=>Carbon::now(),
            ]);

            $cart_info = Cart::where('gen_cart_id', Cookie::get('gen_cart_id'))->get();
            foreach($cart_info as $cart_item){
                $product_name = product::find($cart_item->product_id)->product_name;
                $product_price = product::find($cart_item->product_id)->product_price;

                orpder_product_details::insert([
                    'order_id'=>$order_id,
                    'product_name'=>$product_name,
                    'product_price'=>$product_price,
                    'product_quentity'=>$cart_item->product_quentity,
                    'created_at'=>Carbon::now(),
                ]);
                product::find($cart_item->product_id)->decrement('product_quentity', $cart_item->product_quentity);
            }



            $mak = order::where('id', $order_id)->get();
            Mail::to(Auth::user()->email)->send(new sendinvoice($mak));

            if($request->payment_method == 1){
                Cart::where('gen_cart_id', Cookie::get('gen_cart_id'))->delete();
            }
            else{
                Cart::where('gen_cart_id', Cookie::get('gen_cart_id'))->delete();
                return redirect('/online/payment');
            }

            return redirect('/cart')->with('sucs', 'Your Order Successfully Done');
        }
        else{
            return back()->with('payment', 'Plz Select Checkbox');
        }

    }


}
