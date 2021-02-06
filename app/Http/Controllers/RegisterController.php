<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegisterController extends Controller
{
    public function OnRegister(Request $request)
    {
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $city = $request->input('city');
        $username = $request->input('username');
        $password = $request->input('password');
        $gender = $request->input('gender');

       $userCount = Registration::where('username',$username)->count();
       if($userCount != 0){
        return 'user already exits!';
       }else{
          $result = Registration::insert([
                'f_name' => $f_name,
                'l_name' => $l_name,
                'city' => $city,
                'username' => $username,
                'password' => $password,
                'gender' => $gender

            ]);

            if($result == true){
                return "registration successfully";
            }else{
                return "registration fail? please try again";
            }
       }
    }
}
