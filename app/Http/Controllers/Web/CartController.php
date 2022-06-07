<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addtocart(Request $request){
        if(Session::has('user_id')){
            $dataid = Product::select('product_id')->where('product_id',$request->id)->first();
            $cart = Cart::where('p_id', $request->id)->first();

            if(empty($cart)){
                try{
                    Cart::create([
                        'p_id'=> $dataid->product_id,
                        'ip_add'=>$_SERVER ['REMOTE_ADDR'],
                        'user_id'=> Session::get('user_id'),
                        'qty'=> 1,
                    ]);
                    return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
                }catch (\Exception $err){
                    dd($err);
                    return redirect()->back()->with('error',$err->getMessage());
                }
            }else{
                $cart = Cart::where('p_id', $request->id)->first();

                $cart->qty = $cart->qty + 1;
                $cart->save();

                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }

        }else{
            return redirect()->back()->with('notify','Bạn chưa đăng nhập');
        }
    }
    function cart(){
        $data = Cart::where('user_id', Session::get('user_id'))->get();

        return view('web.cart',[
            'title' => 'Giỏ hàng',
            'data'  => $data,
        ]);
    }

    function delete($id){
        $delete = Cart::find($id);
        $delete->delete();
        return redirect()->back()->with('notify','Xóa thành công');
    }

    function buy(){
        $data = Cart::where('user_id',Session::get('user_id'))->get();
        if($data->count()>0){
            try{
                for ($i=0; $i < $data->count() ; $i++) {
                    Order::create([
                        'user_id' => Session::get('user_id'),
                        'product_id' => $data[$i]->p_id,
                        'qty' => $data[$i]->qty,
                        'p_status' => 'Completed',
                    ]);
                }
                $cart = Cart::where('user_id',Session::get('user_id'));
                $cart->delete();
                return redirect()->back()->with('success','Đặt hàng thành công');
            }catch (\Exception $err){
                return redirect()->back()->with('error',$err->getMessage());
            }
        }
    }
}
