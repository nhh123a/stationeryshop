<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    function index(){
        return view('admin.category.list',[
            'title' => 'Danh sách danh mục',
            'data'  => Category::paginate(5),
        ]);
    }

    function create(){
        return view('admin.category.add',[
            'title' => 'Thêm danh mục'
        ]);
    }
    function store(Request $request){
        $data = $request->except('_token');
        $cat = Category::where('cat_title',$data['cat_title'])->first();
        if(empty($cat)){
            $insert = Category::insert($data);
            if($insert){
                return redirect()->route('listcategory')->with('success','Thêm danh mục thành công');
            }else{
                return redirect()->back()->with('error','Thêm danh mục thất bại');
            }
        }else{
            return redirect()->back()->with('error','Danh mục đã tồm tại');
        }
        return redirect()->back()->with('error','Thêm danh mục thất bại');
    }

    function destroy($id){
        $delete = Category::find($id);
        $delete->delete();
        if($delete){
            return redirect()->route('listcategory')->with('success','Xóa danh mục thành công');
        }else{
            return redirect()->back()->with('error','Xóa danh mục thất bại');
        }
    }

    function edit($id){
        return view('admin.category.edit',[
            'title' => 'Sửa danh mục',
            'data' => Category::where('cat_id',$id)->get(),
        ]);
    }

    function update(Request $request){
        $cat = Category::where('cat_title',$request->input('cat_title'))->first();
        //dd($cat);
        if(empty($cat)){
            $update = Category::find($request->id);
            $update->cat_title = $request->input('cat_title');

            $update->save();
            if($update){
                return redirect()->route('listcategory')->with('success','Sửa danh mục thành công');
            }else{
                return redirect()->back()->with('error','Sửa danh mục thất bại');
            }
        }else{
            return redirect()->back()->with('error','Danh mục đã tồm tại');
        }
        return redirect()->back()->with('error','Sửa danh mục thất bại');
    }

    function search(Request $request){
        if(!empty($_GET['search'])){
            $search = $_GET['search'];
            $data = Category::where('cat_title','LIKE','%'.$search.'%')->paginate(5)->appends($request->input());

            return view('admin.category.list',[
                'title' => 'Danh sách danh mục',
                'data' => $data
            ]);
        }else{
            return redirect()->route('listcategory');
        }
    }
}
