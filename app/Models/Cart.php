<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cart';
    protected $fillable = [
        'p_id',
        'ip_add',
        'user_id',
        'qty',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product','p_id','product_id');
    }
}
