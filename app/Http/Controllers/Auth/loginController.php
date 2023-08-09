<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('POST')){
            // dd(123);
            if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                return redirect()->to('/home');
            }else{
               return view('auth.login1');
            // dd($request->email);
            }
        }
        return view('auth.login1');
    }
    public function logout() {
   Auth::logout();
  return redirect()->to('/login');
    }
}
