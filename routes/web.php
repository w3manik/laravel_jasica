<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
//fronted Controller
Route::get('/fc', [FrontendController::class, 'trt']);
Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/produt/details/{product_id}', [FrontendController::class, 'produtdetlas']);
Route::get('/produt/shop', [FrontendController::class, 'prodshop']);
// Route::get('/produt/newarival', [FrontendController::class, 'newarival']);

//check
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/getcitylist', [CartController::class, 'getcitylist']);
Route::post('/order/confirm', [CartController::class, 'order']);

//blog
Route::get('/addblog', [HomeController::class, 'blog']);
Route::post('/blog/insert', [HomeController::class, 'bloginsrt']);
Route::get('/blog/delete/{blog_id}', [HomeController::class, 'blgdelete']);
Route::get('/blog/details/{blog_id}', [HomeController::class, 'blgdetils']);

//about

Route::get('/addto/about', [FrontendController::class, 'abdah']);
Route::post('/about/insert', [FrontendController::class, 'abinsert']);
Route::get('/about/delete/{about_id}', [FrontendController::class, 'abdelete']);
Route::get('/aouttile', [FrontendController::class, 'abouttile']);
Route::post('/abt/bestprdt', [FrontendController::class, 'abutitleinst']);
Route::get('/abouttprdt/{about_id}', [FrontendController::class, 'abouttidelete']);

Route::get('/about', [FrontendController::class, 'about']);

//team
Route::get('/addteam', [FrontendController::class, 'addteam']);
Route::post('/addteam', [FrontendController::class, 'tem']);
Route::get('/adtem/delete/{team_id}', [FrontendController::class, 'temdel']);
Route::get('/addtesti', [FrontendController::class, 'testimonial']);
Route::post('/textimonial', [FrontendController::class, 'testipost']);
Route::get('/aboutslider', [FrontendController::class, 'abouslider']);
Route::post('/abslider', [FrontendController::class, 'ablogo']);


//contuct
Route::get('/contuct', [FrontendController::class, 'contuct']);
Route::post('/contact/submit', [FrontendController::class, 'confiminsert']);

//privacey
Route::get('/privecy', [FrontendController::class, 'privecy']);

//privacey
Route::get('/addfaq', [FrontendController::class, 'index']);
Route::post('/faq/insert', [FrontendController::class, 'faqpost']);
Route::get('/faq/delete/{faq_id}', [FrontendController::class, 'faqdelete']);
Route::get('/faq', [FrontendController::class, 'faq']);

//blog ared
Route::get('/blogarea', [FrontendController::class, 'blogarea']);


//baner
Route::get('adbaner', [FrontendController::class, 'adbaner']);
Route::post('baner/insert', [FrontendController::class, 'baninsert']);
Route::get('allbaner', [FrontendController::class, 'allbaner']);
Route::get('allbaner/delete/{baner_id}', [FrontendController::class, 'bandelete']);

///category
Route::get('/addcategory', [CategoryController::class, 'index']);
Route::post('category/insert', [CategoryController::class, 'insert']);
Route::get('category/delete/{category_id}', [CategoryController::class, 'delete']);

//subcategory
Route::get('/adsubcate', [SubcategoryController::class, 'index']);
Route::post('/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('subcate/delete/{subcategory_id}', [SubcategoryController::class, 'delete']);
Route::get('subcate/edit/{subcategory_id}', [SubcategoryController::class, 'subedit']);
Route::post('subcate/update', [SubcategoryController::class, 'subupd']);
Route::post('subcate/markdele', [SubcategoryController::class, 'markdlete']);

//profile
Route::get('profile', [profilecontroller::class, 'profile']);
Route::post('profile/namechange', [profilecontroller::class, 'profiname']);
Route::post('profile/passchange', [profilecontroller::class, 'prfpasschange']);
Route::post('profile/imagechange', [profilecontroller::class, 'profilechange']);

//product
Route::get('addproduct', [ProductController::class, 'product']);
Route::post('/product/insert', [ProductController::class, 'prodinsert']);
Route::get('/allproduct', [ProductController::class, 'allprodt']);
Route::get('/prdouct/delete/{product_id}', [ProductController::class, 'delete']);
Route::get('/prdouct/edit/{product_id}', [ProductController::class, 'proedit']);
Route::post('/product/updated', [ProductController::class, 'productupdate']);

//cart
Route::post('/add/tocart', [CartController::class, 'addtocart']);
Route::get('/cart/delete/{cart_id}', [CartController::class, 'cartdelete']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/cart/{copon_name}', [CartController::class, 'cart']);
Route::post('/cart/update', [CartController::class, 'cartupdate']);

//wishlisht
Route::get('/wishlist', [wishlistController::class, 'wishlist']);
Route::post('/addto/wishlist', [wishlistController::class, 'addtowish']);
// Route::post('/wishlist/insert', [WhishlishtController::class, 'insert']);
// Route::get('/wishlist/delete/{wishlish_id}', [WhishlishtController::class, 'wishlistdel']);


//cupon
Route::get('/addcupon', [CuponController::class, 'cupon']);
Route::post('/cupon/insert', [CuponController::class, 'cuinsert']);

//user
Route::post('/user/insert', [HomeController::class, 'inert']);


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


//invoice download
Route::get('/invoice/download/{order_id}', [HomeController::class, 'invoice']);
//invoice send
Route::get('/invoice/send/{order_id}', [HomeController::class, 'invoicesend']);
Route::get('/invoice/sms/{order_id}', [HomeController::class, 'invcsms']);


//search
Route::get('/search', [HomeController::class, 'search']);

//email veryfy
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//review
Route::post('/review', [FrontendController::class, 'review']);

