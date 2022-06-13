<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['product_image', 'category_id', 'subcategory_id', 'product_name', 'product_price', 'description', 'product_quentity'];
}
