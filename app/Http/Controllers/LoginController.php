<?php

namespace App\Http\Controllers;
use \Firebase\JWT\JWT;

use Illuminate\Http\Request;
use App\Models\Registration;

class LoginController extends Controller
{

    public function OnLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $userCount = Registration::where(['username'=>$username,'password'=>$password])->count();
        if($userCount == 1){
            $key = env('TOKEN_KEY');
            $payload = array(
                "website" => "http://codewithrasel.net",
                "username" => $username,
                "iat" => time(),
                "exp" => time()+3600
            );
            $jwt = JWT::encode($payload, $key);
            return response(['Token'=>$jwt, 'status'=>'Login Success']);

        }else{
            return "wrong username or password!";
        }
    }
}
