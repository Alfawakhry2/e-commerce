<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::user()->role==1){
            $latestProducts = Product::orderBy('desc')->limit(3)->get();
            $p_count =Product::count();
            $c_count =Category::count();
            $u_count =User::count();

            return view("Admin.home" , compact('p_count' , 'c_count' , 'u_count' , 'latestProducts'));
        }else{
            
            return view("User.home");
        }
    }

}
