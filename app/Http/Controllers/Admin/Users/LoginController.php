<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\Admin\Users\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    function index(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập admin'
        ]);
    }

    function store(LoginRequest $request){
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ],$request->input('remember') )){
            if($request->input('email') == 'admin@gmail.com'){
                return view('admin.main',[
                    'title' => 'Trang chủ',
                    'name' => Auth::user()->last_name,
                ]);
            }else{
                $user_id = User::where('email',$request->input('email'))->first();
                Session::put("user_id", $user_id->id);
                Session::put("email", $user_id->email);
                return redirect()->route('web');
            }
        }
        Session::flash('error','Đăng nhập thất bại');
        return redirect()->back();
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
