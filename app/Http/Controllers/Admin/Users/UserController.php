<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('admin.users.list',[
            'title' => 'Danh sách tài khoản',
            'data'  => User::paginate(5)
        ]);
    }

    function search(Request $request){
        if($_GET['search']){
            $search = $_GET['search'];
            $data = User::where('email','LIKE','%'.$search.'%')
                    ->orwhere('last_name','LIKE','%'.$search.'%')
                    ->orwhere('first_name','LIKE','%'.$search.'%')
                    ->paginate(5)->appends($request->input());
            //dd($data);
            return view('admin.users.list',[
                'title' => 'Danh sách nhãn hàng',
                'data'  => $data
            ]);
        }else{
            return redirect()->route('listuser');
        }
    }

    function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('listuser')->with('success','Xóa tài khoản thành công');
    }
}
