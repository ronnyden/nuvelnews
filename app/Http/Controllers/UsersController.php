<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function createUser(Request $request){
       $request->validate([
         'name'=>'required|string',
         'email'=>'required|string|unique:users',
         'password'=>'required|string|min:8'
       ]);
      $password = Hash::make($request['password']);
       User::create([
          'name' => $request['name'],
          'email'=> $request['email'],
          'password'=>Hash::make($request['password'])
       ]
           
       );
       return response("User added",201);
    }
    public function login(Request $request){
        $user = User::where( 'email',$request['email'])->get()->first();

        if(!$user || !Hash::check($request['password'],$user->password)){
            return response("Wrong cridentials",401);
        }
         $token = $user->createToken('personal_access_tokens')->plainTextToken;

         $response  = [
             'user' => $user,
             'token' => $token
         ];
         return response($response);
        
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response("Logged out",403);
        
    }
}
