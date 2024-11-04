<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use PHPUnit\Event\Test\Passed;

class AuthController extends Controller
{
    //
    public function signupView()
    {
        return   view("auth.signup");  
    }
    public function signup(Request $request)
    {
        try{
            
        $data = $request->all();
        $user = new User();
        $user->name=$data["name"];
        $user->email=$data["email"];
        $user->password=bcrypt($data["password"]);
        $user->save();
        }
        catch(Exception $e){
            return back()->with("message",$e->getMessage());
        }
        return redirect()->route("auth.login")->with("message","Account Created");
    }
    public function loginView()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $data = $request->only(["email","password"]) ;
        $creds = ["password"=>$data["password"],"email"=>$data["email"]];
        if(!Auth::attempt($creds)){
            return back()->with("message","invlaid creds");
        };
        return redirect()->intended('tickets');

        //$userExists = User::where("email",$email)->first();
        // if(!$userExists)
        // {
        //     return back()->with("message","invlaid creds");
        // }
        // if(!Hash::check($userExists->password,$userExists->password))
        // {
        //     return back()->with("message","invlaid creds");
        // }
        
        

    }
    public function logout(Request $request)
    {
        Auth::logout() ;
        return redirect()->route("auth.login");
    }
    public function forgotPasswordView()
    {
        return view("auth.forgot-password");
    }

    public function forgotPassword(Request $request )
    {
        $email= $request ->email;
        $result = Password::sendResetLink(["email"=>$email]);
        return redirect()->back()->with("message",$result);
        
    }
}
