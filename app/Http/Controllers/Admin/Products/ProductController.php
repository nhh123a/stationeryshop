<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\Admin\Product\ProductCreateFormRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index(){
        return view('admin.products.list',[
            'title' => 'Danh sách sản phẩm',
            'data' => Product::paginate(5),
        ]);
    }

    function search(Request $request){
        if(isset($_GET['search'])){
            $keyword = $_GET['search'];
            return view('admin.products.list',[
                'title' => 'Danh sách sản phẩm',
                'data' => Product::where('product_title','LIKE','%'.$keyword.'%')->paginate(2)->appends($request->input()),
            ]);
        }else{
            return redirect()->back();
        }
    }

    function destroy($id){
        $delete = Product::find($id);
        $image = public_path().'/images/'.$delete->product_image;
        if(File::exists($image)){
            File::delete($image);
        }
        $delete->delete();
        if($delete){
            return redirect()->route('listproduct')->with('success','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }
    }

    function create(){
        return view('admin.products.add',[
            'title' => 'Thêm sản phẩm',
            'brand' => Brand::get(),
            'category' => Category::get(),
        ]);
    }

    function store(ProductCreateFormRequest $request){
        if($request->has('image')){
            $extension = $request->image->extension();
            $cat = Category::where('cat_id',$request->input('product_cat'))->get();
            $brand = Brand::where('brand_id',$request->input('product_brand'))->get();
            $file_name = $cat[0]->cat_title . '_' . $brand[0]->brand_title . '_' .time(). '.'.$extension;
            //dd($file_name);
            $request->image->move(public_path('images'), $file_name);
        }
        $request->merge(['product_image' => $file_name]);
        $data = $request->all();
        unset($data['_token']);
        unset($data['image']);
        // dd($data);
        // $request->except('_token');
        // $request->except('image');
        // dd($request->all());
        $insert = Product::insert($data);
        if($insert){
            return redirect()->route('listproduct')->with('success','Thêm sản phẩm thành công');
        }else{
            return redirect()->back()->with('error','Thêm sản phẩm thất bại');
        }
    }

    function edit($id){
        return view('admin.products.edit',[
            'title' => 'Sửa sản phẩm',
            'brand' => Brand::get(),
            'category' => Category::get(),
            'data'  => Product::where('product_id',$id)->get(),
        ]);
    }

    function update(ProductCreateFormRequest $request){
        if($request->has('image')){
            $extension = $request->image->extension();
            $cat = Category::where('cat_id',$request->input('product_cat'))->get();
            $brand = Brand::where('brand_id',$request->input('product_brand'))->get();
            $file_name = $cat[0]->cat_title . '_' . $brand[0]->brand_title . '_' .time(). '.'.$extension;
            //dd($file_name);
            $request->image->move(public_path('images'), $file_name);
            $request->merge(['product_image' => $file_name]);
        }
        //dd($request->input());
        try{
            $data = Product::find($request->id);
            $data->product_title = $request->product_title;
            $data->product_brand = $request->product_brand;
            $data->product_cat = $request->product_cat;
            $data->product_desc = $request->product_desc;
            $data->product_price = $request->product_price;
            $data->product_qty = $request->product_qty;
            $image = $data->product_image;
            $data->product_image = $request->has('product_image') ? $request->product_image : $data->product_image;
            $data->product_keywords = $request->product_keywords;

            $path_image = public_path().'/images/'.$image;
            if(File::exists($path_image)){
                File::delete($path_image);
            }
            $data->save();
            return redirect()->route('listproduct')->with('success','Sửa sản phẩm thành công');
        }catch(Exception $err){
            return redirect()->back()->with('error','Sửa sản phẩm thất bại');
        }
    }
}
