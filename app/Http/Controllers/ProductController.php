<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view("Admin.addproduct" , compact("categories"));
    }

    public function store(Request $request){
       //catch
       //validate
       $data = $request->validate([
        'name' => "required|string|max:255",
        'desc' => "required|string",
        'image'=>"required|image|mimes:png,jpg,jpeg",
        'price'=> "required|numeric",
        'quantity'=>"required|integer",
        'category_id'=>"required|exists:categories,id"
       ]);

       $data['image'] = Storage::putFile('Products' , $data['image']);
       //store
       Product::create($data);

       //redirect with session (with as session()->flash())
       return redirect(url('products/create'))->with("success" , "Product Inserted Succssfully");
    }

    //show
    public function allProducts(){
        $products = Product::paginate(10);
        return view("Admin.allproducts" , compact("products"));
    }
    public function show($id){
        $product = Product::findOrfail($id);
        return view("Admin.show" , compact("product"));
    }


    //edit
    public function edit($id){
        $product = Product::findOrfail($id);
        $categories = Category::all();
        return view("Admin.edit" , compact("product" , "categories"));
    }

    public function update(Request $request , $id){
        $product = Product::findorfail($id);
        //catch and validate
        $data = $request->validate([
            'name' => "required|string|max:255",
            'desc' => "required|string",
            'image'=>"image|mimes:png,jpg,jpeg",
            'price'=> "required|numeric",
            'quantity'=>"required|integer",
            'category_id'=>"required|exists:categories,id"
           ]);

           if($request->has('image')){
            if($product->image == null){
                $data['image'] = Storage::putFile("Products" , $data['image']);
            }else{
                Storage::delete($product->image);
                $data['image'] = Storage::putFile("Products" , $data['image']);
            }
           }

           $product->update($data);

           return redirect(url("product/$product->id"))->with("success" , "Product data Updated Successfully");
    }

    //delete

    public function delete($id){
        $product = Product::findorfail($id);
        Storage::delete($product->image);
        $product->delete();

        return redirect(url("products"))->with("success" , "Product Deleted Successfully");
    }
}
