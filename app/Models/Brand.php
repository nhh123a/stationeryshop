<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    public $timestamps = FALSE;
    protected $primaryKey = 'brand_id';
    protected $fillable = [
        'brand_title',
    ];
}
