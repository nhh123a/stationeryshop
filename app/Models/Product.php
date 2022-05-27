<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    protected $table = "products";
    protected $primaryKey = 'product_id';
    protected $fillable =[
            'product_cat'   ,
            'product_brand' ,
            'product_title' ,
            'product_price' ,
            'product_qty'   ,
            'product_desc'  ,
            'product_image' ,
            'product_keywords'
    ];
    public function categories(){
        return $this->hasOne('App\Models\Category','cat_id','product_cat');
    }
    public function brand(){
        return $this->hasOne('App\Models\Brand','brand_id','product_brand');
    }
}
