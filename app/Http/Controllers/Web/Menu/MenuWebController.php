<?php

namespace App\Http\Controllers\Web\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class MenuWebController extends Controller
{
    function category($id){

        $title = Category::select('cat_title')->find($id)->cat_title;
        $data = Product::select('product_id','product_title','product_image','product_price')->where('product_cat',$id)->paginate(9);
        if(isset($_GET['sort_by'])){
            if($_GET['sort_by'] == "price"){
                $data = $data->sortBy('product_price');
            }
            if($_GET['sort_by'] == "title"){
                $data = $data->sortBy('product_title');
            }
            if($_GET['sort_by'] == "new"){
                $data = $data->sortByDesc('product_id');
            }
        }

        return view('web.category.home',[
            'title' => $title,
            'titlew31' => $title,
            'products' => $data,
        ]);
    }

    function brand($id){
        $title = Brand::select('brand_title')->find($id)->brand_title;
        $data = Product::select('product_id','product_title','product_image','product_price')->where('product_brand',$id)->paginate(9);
        return view('web.category.home',[
            'title' => $title,
            'titlew31' => $title,
            'products' => $data,
        ]);
    }
}
