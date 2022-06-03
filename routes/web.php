<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[IndexController::class,"ViewIndex"])->name("view.index");

Route::get("/login",[IndexController::class, "ViewLogin"])->name("view.login");

Route::get("/signup",[IndexController::class, "ViewSignup"])->name("view.signup");

Route::post("/register",[UserController::class, "Register"])->name("register");

Route::post("/login",[UserController::class,"Login"])->name("login");


Route::get("/user/logout",[UserController::class,"Logout"])->name("user.logout");

Route::group(['middleware' => ['userauth']], function () {       //admin routes

    Route::get("/user/logout",[UserController::class,"Logout"])->name("user.logout");
  
    Route::get("/user/dashboard",function(){
        return view("backend.admin_index");
    })->name("user.dashboard");

    //product controller

    Route::get("/product/add",[ProductController::class,"AddProduct"])->name("add.product");

    Route::post("/product/store",[ProductController::class,"StoreProduct"])->name("store.product");

    Route::get("/product/manage",[ProductController::class, "ManageProduct"])->name("manage.product");

    Route::get("/product/edit/{id}",[ProductController::class, "EditProduct"])->name("edit.product");

    Route::post("/product/update/{id}",[ProductController::class,"UpdateProduct"])->name("update.product");

    Route::get('/product/barcode/download/{product_code}',[ProductController::class,'BarcodeDownload'])->name("download.barcode");

    Route::get("/product/delete/{id}",[ProductController::class, 'DeleteProduct'])->name("delete.product");

    //order routes

    Route::get('/order',[OrderController::class,'Order'])->name("order");

    Route::post('/order/store',[OrderController::class,'OrderStore'])->name("order.store");

    Route::get('/product/scan/{id}', [ProductController::class, 'ScanProduct'])->name("edit.scan");

    Route::get('/scan/data/ajax/{p_code}', [ProductController::class, 'Scandata'])->name("data.scan");

    Route::post('/product/invoice/add',[OrderController::class, 'AddInvoice'])->name("add.invoice"); 

    Route::get('/invoice/item/edit/{id}',[OrderController::class,"EditInvoice"])->name("edit.item");

    Route::post('/invoice/item/update/{id}',[OrderController::class,"UpdateInvoice"])->name("item.update");

    Route::get('/invoice/item/delete/{id}',[OfflineOrderController::class,"DeleteInvoice"])->name("delete.item");

    Route::get('/product/invoice/view/{id}',[ProductController::class,'ViewInvoice'])->name("invoice.view");

    //orders 

    Route::get("/order/view",[OrderController::class,"ViewOrder"])->name("view.order");

    Route::get("order/details/{id}",[OrderController::class,"ViewOrderDetails"])->name("order.details");
    
    //chage user info

    Route::get("/user/email/change",[UserController::class,"ChangeEmail"])->name("change.email");

    Route::post("/user/email/update",[UserController::class,"UpdateEmail"])->name("update.email");

    Route::get("/user/password/change",[UserController::class,"ChangePassword"])->name("change.password");

    Route::post("/user/password/update",[UserController::class,"UpdatePassword"])->name("update.password");
    
});
