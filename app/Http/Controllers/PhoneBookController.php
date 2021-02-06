<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\Models\PhoneBook;

class PhoneBookController extends Controller
{
    public function insert(Request $request)
    {
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));

        $decoded_array = (array)$decoded;
        $username = $decoded_array['username'];

        $phone_number1 = $request->input('phone_number1');
        $phone_number2 = $request->input('phone_number2');
        $name = $request->input('name');
        $email = $request->input('email');

       $result = PhoneBook::insert([
            'username' => $username,
            'phone_number1' => $phone_number1,
            'phone_number2' => $phone_number2,
            'name' => $name,
            'email' => $email
        ]);

        if($result==true){
            return 'data insert success';
        }else{
            return 'data inset failed';
        }
    }

    public function select(Request $request)
    {
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));

        $decoded_array = (array)$decoded;
        $username = $decoded_array['username'];

        $result = PhoneBook::where('username',$username)->get();
        return $result;
    }

    public function delete(Request $request)
    {
        $email=$request->input('email');
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array)$decoded;
        $username = $decoded_array['username'];
        $result = PhoneBook::where(['username'=>$username,'email'=>$email])->delete();

        if($result){
            return 'delete success';
        }else{
            return 'delete faield! try again';
        }
    }
}
