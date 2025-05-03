<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token = $request->header('access_token');
        if ($access_token !== null) {
            $user = User::where("access_token", $access_token)->first();
            if ($user !== null) {
                if($user->role == 1){
                    return $next($request);
                }else{
                    return response()->json([
                        "msg" => "You not allowed to access this page"
                    ], 302);
                }
            } else {
                return response()->json([
                    "msg" => "access token not correct"
                ], 302);
            }
        } else {
            return response()->json([
                "msg" => "access token not found"
            ], 404);
        }
    }
}
