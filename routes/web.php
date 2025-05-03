<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('home', [HomeController::class, 'redirect'])->middleware('is_admin', 'auth');
// Route::get('home', []);




Route::controller(CategoryController::class)->group(function(){
    Route::middleware('auth', IsAdmin::class)->group(function (){
        //read category
        Route::get('allcategories' , 'allcategories');
        Route::get('showcategory/{id}' , 'showcategory');
        Route::get('categoryproducts/{id}' , 'categoryproducts');

        //add category
        Route::get('addcategory' , 'add');
        Route::post('storecategory' , 'store')->name('storecategory');

        //edit category
        Route::get('editcategory/{id}' , 'edit');
        Route::put('updatecategory/{id}' , 'update')->name('updatecategory');

    });
});


Route::controller(ProductController::class)->group(function () {
    Route::middleware('auth', IsAdmin::class)->group(function () {
        //admin
        //show products
        Route::get('products', 'allProducts');
        Route::get('product/{id}', 'show');

        // insert product
        route::get("products/create", 'create');
        route::post("products", 'store')->name('store');

        //edit
        route::get("product/edit/{id}", 'edit');
        route::put("product/update/{id}", 'update')->name('update');

        //delete
        route::delete("product/delete/{id}", 'delete');

    });

});

//users

Route::controller(UserController::class)->group(function () {
    Route::middleware('auth', IsAdmin::class)->group(function () {
        Route::get('allusers' , 'allusers');
        Route::get('showuser/{id}' , 'showuser')->name('showuser');
    });
});

//localization
Route::get("locale/{lang}", [LocaleController::class, 'setlocale']);

Route::controller(UserController::class)->group(function () {

    Route::get('', 'all');
    Route::get('show/product/{id}', 'show');
    Route::get('search' , 'search');
    Route::post('add/cart/{id}' , 'addtocart');
    Route::get('mycart' , 'showcart');
    Route::delete('delete/item/{id}', 'delete');
    Route::post('make/order' , 'makeorder')->middleware('auth');
    Route::get('categoryproducts/{id}' , 'categoryproducts');

    //orders
    Route::get('showorder' , 'showorder')->middleware('auth');



});

Route::controller(UserController::class)->group(function () {
    Route::middleware('auth', IsUser::class)->group(function () {
        //show
        // Route::get('allproducts', 'all');
        // Route::get('show/product/{id}' , 'show');
    });
});
