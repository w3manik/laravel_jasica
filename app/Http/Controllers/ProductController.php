<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\product;
use App\Models\product_thumbl;
use Carbon\Carbon;
use Image;
use App\Http\Requests\ProductPost;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
{
    function product(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index', compact('categories', 'subcategories'));
    }

    function prodinsert(ProductPost $request){
       $product_id = product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'description'=>$request->description,
            'product_quentity'=>$request->product_quentity,
            'created_at'=>Carbon::now(),
        ]);

        $new_product_photo = $request->product_image;
        $extention = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id.'.'.$extention;

        Image::make($new_product_photo)->save(base_path('public/uplodes/product/'.$new_product_name));
        product::find($product_id)->update([
            'product_image'=>$new_product_name,
        ]);

        $star = 1;
        foreach($request->file('product_thumbles') as $single_img){
            $extention = $single_img->getClientOriginalExtension();
            $new_thumbals_name = $product_id.'-'.$star.'.'.$extention;
            Image::make($single_img)->save(base_path('public/uplodes/product/thumbles/'.$new_thumbals_name));
            product_thumbl::insert([
                'product_id'=>$product_id,
                'product_thumbles'=>$new_thumbals_name,
                'created_at'=>Carbon::now(),
            ]);
            $star++;
        }



        return back()->with('prodad', 'Product Added');
    }


    function allprodt(){
        $products = product::all();
        return view('admin.product.allproduct', compact('products'));
    }

    function delete($product_id){
        product::find($product_id)->delete();
        return back()->with('productde', 'product Deleted');
    }

    function proedit($product_id){
        $products = product::find($product_id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.productedit', compact('products', 'categories', 'subcategories'));
    }

    function productupdate(Request $request){
        product::find($request->product_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'description'=>$request->description,
            'product_quentity'=>$request->product_quentity,
        ]);

        if($request->hasFile('product_image')){

            if($request->product_old_image != ''){
                $delete_path = public_path()."/uplodes/product/".$request->product_old_image;
                unlink($delete_path);
            }

            $new_product_image = $request->product_image;
            $new_extension = $new_product_image->getClientOriginalExtension();
            $new_product_image_name = $request->product_id.'.'.$new_extension;

            Image::make($new_product_image)->save(public_path('uplodes/product/'.$new_product_image_name));
            Product::find($request->product_id)->update([
                'product_image'=>$new_product_image_name,
            ]);
        }

        return redirect('allproduct')->with('Produpd', 'Product Updated');

    }




}
