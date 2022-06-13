<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
use App\Models\Category;
use App\Models\product;
use App\Models\blog;
use App\Models\baner;
use App\Models\order;
use App\Models\about;
use App\Models\aboutitle;
use App\Models\team;
use App\Models\testimoneal;
use App\Models\aboutlogo;
use App\Models\Contact;
use App\Models\faq;
use Carbon\Carbon;
use Image;
use Auth;



class FrontendController extends Controller
{
    function trt(){
        return view('fc');
    }

    function welcome(){
        $categories = Category::all();
        $products = product::all();
        $baners = baner::all();
        $blogs = blog::all();
        return view('fronted.index', compact('categories', 'products', 'baners', 'blogs'));
    }

    function produtdetlas($product_id){
        $ordr_revews = order::all();
        $produt_info = product::find($product_id);
        $category_id = product::find($product_id)->category_id;
        $related_product = product::where('category_id', $category_id)->where('id', '!=', $product_id)->get();
        return view('fronted.productdetails', compact('produt_info', 'related_product', 'ordr_revews'));
    }




    //baner
    function adbaner(){
        return view('admin.baner.adbaner');
    }

    function baninsert(Request $request){
       $baner_id = baner::insertGetId([
            'buton_name'=>$request->buton_name,
            'title'=>$request->title,
            'created_at'=>Carbon::now(),
        ]);

        $new_baner_photo = $request->baner_pic;
        $extention = $new_baner_photo->getClientOriginalExtension();
        $new_baner_name = $baner_id.'.'.$extention;

        Image::make($new_baner_photo)->save(base_path('public/uplodes/baner/'.$new_baner_name));
        baner::find($baner_id)->update([
            'baner_pic'=>$new_baner_name,
        ]);

        return back()->with('banad', 'Baner Added Successfully');
    }

    function allbaner(){
        $baners = baner::all();
        return view('admin.baner.allbaner', compact('baners'));
    }

    function bandelete($baner_id){
        baner::find($baner_id)->delete();
        return back()->with('bandeel', 'baner Deleted');
    }

    function prodshop(){
        $products = product::all();
        $product_info = product::all();
        return view('fronted.shop', compact('products', 'product_info'));
    }

    //review
    function review(Request $request){
        order::where('user_id', Auth::id())->where('product_id', $request->product_id)->whereNull('review')->first()->update([
            'review'=>$request->review,
            'star'=>$request->star,
        ]);
        return back();
    }

    //about dash

    function abdah(){
        $abouts = about::all();
        return view('admin.about.index', compact('abouts'));
    }

    function abdelete($about_id){
        about::find($about_id)->delete();
        return back()->with('abtd', 'About Deleted');
    }

    function abinsert(Request $request){
        $about_id = about::insertGetId([
            'head'=>$request->head,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);

        $new_about_photo = $request->abt_image;
        $extention = $new_about_photo->getClientOriginalExtension();
        $new_about_name = $about_id.'.'.$extention;

        Image::make($new_about_photo)->save(base_path('public/uplodes/about/'.$new_about_name));
        about::find($about_id)->update([
            'abt_image'=>$new_about_name,
        ]);

        return back()->with('adab', 'About Added Successfully');
    }

    function abouttile(){
        $aboutitles = aboutitle::all();
        return view('admin.about.bestprod', compact('aboutitles'));
    }

    function abutitleinst(Request $request){
        aboutitle::insert([
            'title'=>$request->title,
            'des'=>$request->des,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('adti', 'About Title Added');
    }

    function abouttidelete($about_id){
        aboutitle::find($about_id)->delete();
        return back()->with('ablist', 'About List DElete');
    }




    //about
    function about(){
        $abouts = about::all();
        $aboutitles = aboutitle::all();
        $teams = team::all();
        $testimonials = testimoneal::all();
        $aboutlogos = aboutlogo::all();
        return view('fronted.about', compact('abouts', 'aboutitles', 'teams', 'testimonials', 'aboutlogos'));
    }

    //team

    function addteam(){
        $teams = team::all();
        return view('admin.team.index', compact('teams'));
    }

    function tem(Request $request){
        $team_id = team::insertGetId([
            'name'=>$request->name,
            'Work'=>$request->Work,
            'created_at'=>Carbon::now(),
        ]);

        $new_team_photo = $request->tem_image;
        $extention = $new_team_photo->getClientOriginalExtension();
        $new_team_name = $team_id.'.'.$extention;

        Image::make($new_team_photo)->save(base_path('public/uplodes/team/'.$new_team_name));
        team::find($team_id)->update([
            'tem_image'=>$new_team_name,
        ]);

        return back()->with('temad', 'Team Added');
    }

    function temdel($team_id){
        team::find($team_id)->delete();
        return back()->with('tem', 'team deleted');
    }

    //testimonial

    function testimonial(){
        $testimonials = testimoneal::all();
        return view('admin.about.testmnl', compact('testimonials'));
    }

    function testipost(Request $request){
        $testimonial_id = testimoneal::insertGetId([
            'name'=>$request->name,
            'descp'=>$request->descp,
            'created_at'=>Carbon::now(),
        ]);

        $new_tesimonial_photo = $request->testimonial_image;
        $extention = $new_tesimonial_photo->getClientOriginalExtension();
        $new_testi_name = $testimonial_id.'.'.$extention;

        Image::make($new_tesimonial_photo)->save(base_path('public/uplodes/testimonial/'.$new_testi_name));
        testimoneal::find($testimonial_id)->update([
            'testimonial_image'=>$new_testi_name,
        ]);

        return back()->with('testad', 'testimonial added');
    }


    //about logo slider
    function abouslider(){
        $aboutlogos = aboutlogo::all();
        return view('admin.about.abslider', compact('aboutlogos'));
    }

    function ablogo(Request $request){
        $ablogo_id = aboutlogo::insertGetId([
            'created_at'=>Carbon::now(),
        ]);

        $new_ablogo_photo = $request->about_pic;
        $extention = $new_ablogo_photo->getClientOriginalExtension();
        $new_ablname_name = $ablogo_id.'.'.$extention;

        Image::make($new_ablogo_photo)->save(base_path('public/uplodes/ablogo/'.$new_ablname_name));
        aboutlogo::find($ablogo_id)->update([
            'about_pic'=>$new_ablname_name,
        ]);

        return back();
    }

    //contact

    function contuct(){
        return view('fronted.contact');
    }

    function confiminsert(Request $request){
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('cont', 'Message Successfully Done');
    }

    //privecy

    function privecy(){
        return view('fronted.police');
    }

    //faq dahbord
    function index(){
        $faqs = faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    function faqpost(Request $request){
        faq::insert([
            'faq_title'=>$request->faq_title,
            'faq_message'=>$request->faq_message,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('faqad', 'faq added successfully');
    }

    function faqdelete($faq_id){
        faq::find($faq_id)->delete();
        return back()->with('faqdele', 'faq Deleted');
    }


    //faq part
    function faq(){
        $faqs = faq::all();
        return view('fronted.faq', compact('faqs'));
    }

    //blog area
    function blogarea(){
        return view('fronted.blog_grid');
    }



}
