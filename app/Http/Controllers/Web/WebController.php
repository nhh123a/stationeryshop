<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    function index(){
        return view('web.home',[
            'title' => 'Stationery Shop',
            'product1' => Product::select('product_id','product_title','product_image','product_price')
                                ->where('product_cat',1)->take(3)->get(),
            'product2' => Product::select('product_id','product_title','product_image','product_price')
                                ->where('product_cat',3)->take(3)->get(),
            'product3' => Product::select('product_id','product_title','product_image','product_price')
                                ->where('product_cat',5)->take(3)->get(),
        ]);
    }

    function productdetails($id){
        $data = Product::find($id);

        return view('web.product.detail',[
            'title' => 'Details Product',
            'data'  => $data,
            'mores'  => Product::select('product_id','product_title','product_price','product_image')
                                ->where('product_cat',$data->product_cat)->take(6)->get(),
        ]);
    }


}
