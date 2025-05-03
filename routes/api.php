<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use App\Http\Middleware\APiAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
    


Route::controller(ApiProductController::class)->group(function(){
    Route::middleware(APiAuth::class)->group(function(){

        //read data
        Route::get('products' , 'all');
        Route::get('product/{id}' , 'show');

        //create data
        Route::post('product/create' , 'store');

        //update data
        Route::put('product/edit/{id}' , 'update');

        //delete data
        Route::delete('product/delete/{id}' , 'delete');

    });
});

Route::controller(ApiAuthController::class)->group(function(){
    //register
    Route::post("register" , "register");

    // login
    Route::post("login" , 'login');

    //logout
    Route::post("logout" , "logout")->middleware(APiAuth::class);


});
