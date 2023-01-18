<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\flavorController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\paymentController;
use Illuminate\Support\Facades\Auth;

//Settings Login and Home Page
Route::get('/', function () {
    return redirect()->route('home');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'home'])->name('home');

//If user tying to access doesnot exist page->direct it to main page (App/Exceptions/Handler.php)

//Admin access
Route::group(['middleware'=>'isAdmin'],function(){
    //Dashboard
    Route::get('/dashboard', [homeController::class, 'dashboard'])->name('dashboard');
    //Insert Category
    Route::get('/insertCategory', [categoryController::class, 'create'])->name('insertCategory');
    Route::post('/addCategory',[categoryController::class, 'add'])->name('addCategory'); 
    //Insert cake size
    Route::get('/insertSize', [sizeController::class, 'create'])->name('insertSize');
    Route::post('/addSize',[sizeController::class, 'add'])->name('addSize'); 
    //Insert flavor
    Route::get('/insertFlavor', [flavorController::class, 'create'])->name('insertFlavor');
    Route::post('/addFlavor',[flavorController::class, 'add'])->name('addFlavor');    
    //Insert Product
    Route::get('/insertProduct', [productController::class, 'create'])->name('insertProduct');
    Route::post('/addProduct',[productController::class, 'add'])->name('addProduct'); 
    //View Product
    Route::get('/viewProduct', [productController::class, 'view'])->name('viewProduct');
    //Edit Product --> Update it
    Route::get('/editProduct/{id}', [productController::class, 'edit'])->name('editProduct');
    Route::post('/updateProduct', [productController::class, 'update'])->name('updateProduct');
    //Delete product
    Route::get('/viewProduct/delete/{id}', [productController::class, 'delete'])->name('deleteProduct');
    //Search product
    Route::post('/searchProductAdmin', [productController::class, 'searchByAdmin'])->name('searchByAdmin');
});

// User access
Route::group(['middleware'=>'isUser'],function(){
    //Show products + details
    Route::get('/products',[productController::class,'products'])->name('products');
    Route::get('/products/{id}', [productController::class, 'productDetails'])->name('productDetails');
    //Add to cart
    Route::get('/myCart/{id}',[cartController::class,'show'])->name('myCart');
    Route::post('/addToCart',[cartController::class,'add'])->name('addToCart');
    //Delete cart
    Route::get('/deleteCart/{id}',[cartController::class,'delete'])->name('deleteCart');
    //Update cart
    Route::post('/updateCart',[cartController::class,'updateCart'])->name('updateCart');
    //Create order
    Route::post('/createOrder', [orderController::class, 'add'])->name('createOrder');
    //View order, details
    Route::get('/myOrder', [orderController::class, 'show'])->name('myOrder');
    Route::get('/myOrder/{id}', [orderController::class, 'orderDetails'])->name('orderDetails');
    //Payment
    Route::get('/pay/{id}', [PaymentController::class, 'pay'])->name('pay');
    Route::post('/checkout', [PaymentController::class, 'paymentPost'])->name('payment.post');
    //Order receipt
    Route::get('/viewReceipt/{id}',[pdfController::class,'view'])->name('viewReceipt');
    Route::get('/receipt/{id}',[pdfController::class,'pdfReport'])->name('generatePDF');
});

//Search products
Route::post('/searchProducts',[productController::class,'search'])->name('search');

//Search by Category
Route::get('/category/cake', [productController::class, 'cakeCategory'])->name('cakeCategory');
Route::get('/category/bread', [productController::class, 'breadCategory'])->name('breadCategory');
Route::get('/category/cookies', [productController::class, 'cookiesCategory'])->name('cookiesCategory');

//Client and Admin Access
Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'service'])->name('service');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

//Handle error pages
Route::get('/404', [HomeController::class, 'error'])->name('error');