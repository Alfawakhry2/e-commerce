<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    //read
    public function all(){
        $products = Product::all();
        if($products == null){
            return response()->json([
                "msg"=>"No Data To Display"
            ] , 404);
        }
        //return in json format
        return ProductResource::collection($products);
    }

    public function show($id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                "msg"=>"Product Not Found"
            ] , 404);
        }

        // used in specific id
        return new ProductResource($product);
    }


    //create
    public function store(Request $request){
        //validate with validator
        $validator = Validator::make($request->all() , [
            'name' => "required|string|max:255",
            'desc' => "required|string",
            'image'=>"required|image|mimes:png,jpg,jpeg",
            'price'=> "required|numeric",
            'quantity'=>"required|integer",
            'category_id'=>"required|exists:categories,id"
        ]);

        if($validator->fails()){
            return response()->json([
                "errors" => $validator->errors()
            ] , 301);
        }

        $request->image = Storage::putFile('Products' , $request->image);

        Product::create([
            "name"=>$request->name ,
            "desc"=>$request->desc ,
            "price"=>$request->price ,
            "quantity"=>$request->quantity,
            "image"=>$request->image,
            "category_id"=>$request->category_id
        ]);

        return response()->json([
            "msg"=>"Producted created Succsfully"
        ], 201);
    }


    public function update(Request $request , $id){



        $validator = Validator::make($request->all() , [
            'name' => "string|max:255",
            'desc' => "string",
            'image'=>"image|mimes:png,jpg,jpeg",
            'price'=> "numeric",
            'quantity'=>"integer",
            'category_id'=>"exists:categories,id"
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()
            ],301);
        }
        //check product that typed
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                "msg"=>"Product Not Found"
            ],404);
        }

        //take old data of all product
        $imageName = $product->image;
        //other inputs if he want to edit only name or desc or etc (means edit one only )
        // this mean if user not add any values to input will , old values exists
        $name = $product->name ;
        $desc = $product->desc ;
        $price = $product->price ;
        $quantity = $product->quantity ;    
        $category_id = $product->category_id ;

        if($request->has('image')){
            Storage::delete($imageName);
            $imageName = Storage::putFile("Products" , $request->image);
        }
        if($request->has('name')){
            $name = $request->name;
        }
        if($request->has('desc')){
            $desc = $request->desc;
        }
        if($request->has('price')){
            $price = $request->price;
        }
        if($request->has('quantity')){
            $quantity = $request->quantity;
        }
        if($request->has('category_id')){
            $category_id = $request->category_id;
        }
        //update
        $product->update([
            "name"=>$name ,
            "desc"=>$desc ,
            "price"=>$price ,
            "quantity"=>$quantity,
            "image"=>$imageName,
            "category_id"=>$category_id
        ]);

        //response

        //don't forget ?_method = put in parameters ***
        return response()->json([
            "msg"=>"Product Updated Successfully",
            "product"=>new ProductResource($product)
        ], 201);


    }

    public function delete($id , Request $request){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                'msg'=>"No product to delete"
            ], 404);
        }

        if($product->image !== null){
            Storage::delete($product->image);
        }
        $product->delete();

        //don't forget ?_method =delete in parameters ***
        return response()->json([
            'msg'=>"Product Deleted Succssfully"
        ], 201);
    }


}
