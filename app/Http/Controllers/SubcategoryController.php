<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use App\Http\Requests\SubcategoryPost;

class SubcategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('categories', 'subcategories'));
    }

    function insert(SubcategoryPost $request){

        if(Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()){
            return back()->with('adsub', 'This Name Alredy Exists');
        }
        else{
            Subcategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('subcateogyad', 'Subcategory Added');
        }
    }

    function delete($subcategory_id){
        Subcategory::find($subcategory_id)->delete();
        return back()->with('sub', 'subcategory Deleted');
    }

    function markdlete(Request $request){
        if($request->mark_id){
            foreach($request->mark_id as $single_id){
                Subcategory::find($single_id)->delete();
            }
        }
        return back();
    }

    function subedit($subcategory_id){
        $categories = Category::all();
        $subcategories = Subcategory::find($subcategory_id);
        return view('admin.subcategory.edit', compact('subcategories', 'categories'));
    }

    function subupd(Request $request){
        Subcategory::find($request->subcategory_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect('adsubcate')->with('subupdt', 'Subcategory Updated');
    }

}
