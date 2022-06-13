<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\product;
use Carbon\Carbon;
use App\Http\Requests\CategoryPost;
use Auth;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    function insert(CategoryPost $request){
        Category::insert([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('adcat', 'Category added success');
    }

    function delete($category_id){
        Category::find($category_id)->delete();
        Subcategory::where('category_id', $category_id)->forceDelete();
        product::where('category_id', $category_id)->forceDelete();
        return back()->with('catdel', 'Category Delete');
    }

}
