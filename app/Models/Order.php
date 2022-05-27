<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    protected $table = "orders";
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'p_status',
    ];

}
