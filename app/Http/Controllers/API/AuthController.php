<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use PhpParser\Node\Stmt\Return_;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    //
    public function signup(Request $request)
    {
        try{
            
        $data = $request->all();
        $user = new User();
        $user->name = $data ["name"];
        $user->email =$data ["email"];
        $user->password = Hash::make($data['password']);
        $user->save();
        
        return response()->json([
            "msg"=>"user creadet successfully",
            "success"=>true,
            "data" => ["user"=>$user]
        ],201);
        }
        catch(Exception $e){
            return response()->json([
            "msg"=>$e->getMessage(),
            "success"=>false,
            "data" => []
            ],500);
        }
    }
    public function login(Request $request)
    {
        $data =$request->only(["email","password"]);
        $user= User::where("email",$data["email"])->first();
        if(!$user)
        {
            return response()->json(["success"=>false,
            "msg"=>"invalid cards","data"=>[]],400);
        }
        if(!Hash::check($data["password"],$user->password))
        {
            return response()->json(["success"=>false,
            "msg"=>"invalid cards","data"=>[]],400);
        }
       
        $token=$user->createToken('login')->plainTextToken;
        return response()->json(["success"=>true,"msg"=>"loggedin successfully","data"=>[
            "user"=>$user,
            "token"=>$token
            
        ]]);
    }
    public function logout(Request $request)
    {    //get the user from the request
        $user = $request->user('api');
        //get the current token and delete it
        $request->user('api')->currentAccessToken()->delete();
       //return response
        return response()->json(["success"=>true,"msg"=>"logged out succesfully",
        "data"=>['users'=>$user]]);
    }

   
}
