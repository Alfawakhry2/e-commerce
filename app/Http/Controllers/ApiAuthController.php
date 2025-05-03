<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    //register
    public function register(Request $request){
        //validate data
        $validator = Validator::make($request->all() , [
            "name"=>"required|string|max:255",
            "email"=>"required|email|unique:users,email|max:255",
            "password"=>"required|string|confirmed",
        ]);

        if($validator->fails()){
            return response()->json([
            "errors"=>$validator->errors()
            ], 301);
        }

        //encrypt password
        $password = bcrypt($request->password);
        $access_token = Str::random(64);
        //add user
        User::create([
            "name"=>$request->name ,
            "email"=>$request->email,
            "password"=>$password,
            "access_token"=>$access_token ,
        ]);

        return response()->json([
            "msg"=>"You registered Successfully",
            // if need to login after register
            "access_token"=>$access_token
        ], 201);

    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>"required|email|max:255",
            'password'=>"required",
        ]);

        //check inputs
        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ], 301);
        }

        //check the data with db
        $user = User::where("email" , "=" , $request->email)->first();
        if($user !== null){
            $oldPassword = $user->password ; //hashed password
            $Authed = Hash::check($request->password ,$oldPassword );
            $access_token = Str::random(64);
            if($Authed){
                $user->update([
                    "access_token" =>$access_token
                ]);
                return response()->json([
                    "msg"=>"You logged in Successfully" ,
                    "access_token"=>$access_token
                ],200);
            }else{
                return response()->json([
                    'msg'=>"Invalid Cardential"
                ], 301);
            }
        }else{
            return response()->json([
                'msg'=>"Email Not found"
            ], 404);
        }
    }

    public function logout(Request $request){
        //check if there are access token
        $access_token = $request->header("access_token");
        if($access_token !== null){
            $user = User::where("access_token" , "=" , $access_token)->first();
            if($user !== null){
                $user->update([
                    "access_token" => null ,
                ]);
                return response()->json([
                    "msg" => "logedout successfully"
                ],404);

            }else{
                return response()->json([
                    "msg" => "access token not correct"
                ],302);
            }
        }else{
            return response()->json([
                "msg" => "access token not found"
            ],404);
        }
    }
}
