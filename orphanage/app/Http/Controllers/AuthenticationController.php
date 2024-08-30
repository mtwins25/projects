<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\admin;
use App\Models\oparent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function signin()
    {

        return view('authentication.signin');
    }

    public function register()
    {

        return view('authentication.register');
    }
    public function handleRegister(AuthRegisterRequest $request){
        // return $request;

       if(isset($request->R))
       {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin'=>true
        ]);

        $p =admin::create([
            'A_name' => $request->name,
            'phoneNumber' => $request->phone,
            'user_id' => $user->id,
        ]);

         Auth::login($user);
        return redirect()->route('admin');
       }

        else
       { $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $p =oparent::create([
            'P_name' => $request->name,
            'phoneNumber' => $request->phone,
            'user_id' => $user->id,
        ]);

         Auth::login($user);
        return redirect()->route('/');}
    }

    public function handleLogin(AuthLoginRequest $request){
        // return $request;
        $is_login=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$is_login){
            return back()->with('error','Invalid data !');
        }


        if(Auth::user()->isAdmin==0){
            return redirect()->route('parents.index');
        }

        if(Auth::user()->isAdmin==1){
            return redirect()->route('admin');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
}
