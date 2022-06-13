<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\blog;
use Auth;
use Carbon\Carbon;
use PDF;
use Mail;
use Image;
use App\Mail\Sendinvoice;
use App\Http\Requests\blogPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admincheck');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $users = User::where('id', '!=', $user_id)->get();
        $total_usr = User::count();
        $loged_user = Auth::user()->name;
        $orders_by_user = order::where('user_id', Auth::id())->get();
        return view('home', compact('users','total_usr', 'loged_user', 'orders_by_user'));
    }


    function inert(Request $request){
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('usr', 'User Added');
    }

    function invoice($order_id){
        $data = order::find($order_id);
        $pdf = PDF::loadView('admin.pdf.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

    //search
    function search(){
        $q = $_GET['q'];
        $order_by = $_GET['order_by'];

        if($order_by == 1){
            $search_result = product::where('product_name', 'like', '%'.$q.'%')->orderBy('product_name', 'asc')->get();
        }
        else{
            $search_result = product::where('product_name', 'like', '%'.$q.'%')->orderBy('product_name', 'desc')->get();
        }

        return view('fronted.search', compact('search_result'));
    }


    function invoicesend($order_id){
        // $mak = order::where('id', $order_id)->get();
        // Mail::to(Auth::user()->email)->send(new sendinvoice($mak));
        return back()->with('eml', 'Plz Check Your Email');
    }

    //blog
    function blog(){
        $blogs = blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    function bloginsrt(blogPost $request){
        $blog_id = blog::insertGetId([
            'title'=>$request->title,
            'blog_validity'=>$request->blog_validity,
            'blog_desc'=>$request->blog_desc,
            'created_at'=>Carbon::now(),
        ]);

        $new_blog_photo = $request->blog_img;
        $extention = $new_blog_photo->getClientOriginalExtension();
        $new_blog_name = $blog_id.'.'.$extention;

        Image::make($new_blog_photo)->save(base_path('public/uplodes/blog/'.$new_blog_name));
        blog::find($blog_id)->update([
            'blog_img'=>$new_blog_name,
        ]);

        return back()->with('blog', 'blog Added Successfully');

    }

    function blgdelete($blog_id){
        blog::find($blog_id)->delete();
        return back('delb', 'Blog Deleted');
    }

    function blgdetils($blog_id){
        $blogs = blog::find($blog_id);
        return view('admin.blog.blog_details', compact('blogs'));
    }

    function invcsms($order_id){

        $order_details = order::find($order_id);
        $order_id = $order_details->order_id;
        $total = $order_details->total;
        $discount = $order_details->discount;
        $subtotal = $order_details->subtotal;
        $phone = $order_details->phone;

        $url = "http://66.45.237.70/api.php";
        $number=$phone;
        $text="Your Order ID: ".$order_id.' '."Total :".$total.' '."Discount :".$discount.' '."Total Payment Recived :".$subtotal;
        $data= array(
        'username'=>"minulmk",
        'password'=>"TM8NPB29",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

        if($sendstatus == 1101){
            return back()->with('msuc', 'Plz Check Your Message');
        }



    }


}
