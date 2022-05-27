<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function index(){
        return view('admin.brand.list',[
            'title' => 'Danh sách nhãn hàng',
            'data'  => Brand::paginate(5),
        ]);
    }

    function create(){
        return view('admin.brand.add',[
            'title' =>'Thêm nhãn hàng'
        ]);
    }

    function store(Request $request){
        $brand = Brand::where('brand_title',$request->input('brand_title'))->first();
        if(empty($brand)){
            $insert = Brand::create($request->input());
            if(!empty($insert)){
                return redirect()->route('listbrand')->with('success','Thêm nhãn hàng thành công');
            }else{
                return redirect()->route('listbrand')->with('error','Thêm nhãn hàng thất bại');
            }
        }else{
            return redirect()->back()->with('error','nhãn hàng đã tồn tại');
        }

    }

    function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('listbrand')->with('success','Xóa nhãn hàng thành công');
    }

    function edit($id){
        //dd(Brand::find($id)->brand_id);
        return view('admin.brand.edit',[
            'title' => 'Sửa nhãn hàng',
            'data'  => Brand::find($id),
        ]);
    }

    function update(Request $request){
        $br = Brand::where('brand_title',$request->input('brand_title'))->first();
        if(empty($br)){
            $brand = Brand::find($request->id);
            $brand->brand_title = $request->brand_title;

            $brand->save();
            return redirect()->route('listbrand')->with('success','Sửa nhãn hàng thành công');
        }else{
            return redirect()->back()->with('error','nhãn hàng đã tồn tại');
        }
    }

    function search(Request $request){
        if($_GET['search']){
            $search = $_GET['search'];
            $data = Brand::where('brand_title','LIKE','%'.$search.'%')->paginate(5)->appends($request->input());
            return view('admin.brand.list',[
                'title' => 'Danh sách nhãn hàng',
                'data'  => $data
            ]);
        }else{
            return redirect()->route('listbrand');
        }
    }
}
