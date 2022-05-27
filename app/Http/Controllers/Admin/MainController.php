<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function index(){
        return view('admin.main',[
            'title' => 'Trang chủ',
            'name' => 'name',
        ]);
    }
}
