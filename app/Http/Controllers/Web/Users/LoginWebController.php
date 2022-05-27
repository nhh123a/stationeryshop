<?php

namespace App\Http\Controllers\Web\Users;

use App\Http\Requests\Admin\Users\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginWebController extends Controller
{

    function store(LoginRequest $request){
        //dd($request);
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])){
            $user_id = User::where('email',$request->input('email'))->first();
            Session::put("user_id", $user_id->id);
            Session::put("email", $user_id->email);
            return redirect()->route('web');
        }else{
            dd($request);
        }

        Session::flash('error','Đăng nhập thất bại');
        return redirect()->back();
    }

    function logout(){
        Session::forget('user_id');
        Session::forget('email');
        Auth::logout();
        return redirect()->route('web');
    }
}
