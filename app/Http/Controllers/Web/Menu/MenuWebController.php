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
        return view('web.category.home',[
            'title' => $title,
            'titlew31' => $title,
            'products' => Product::select('product_id','product_title','product_image','product_price')->where('product_cat',$id)->paginate(9),
        ]);
    }

    function brand($id){
        $title = Brand::select('brand_title')->find($id)->brand_title;
        return view('web.category.home',[
            'title' => $title,
            'titlew31' => $title,
            'products' => Product::select('product_id','product_title','product_image','product_price')->where('product_brand',$id)->paginate(9),
        ]);
    }
}
