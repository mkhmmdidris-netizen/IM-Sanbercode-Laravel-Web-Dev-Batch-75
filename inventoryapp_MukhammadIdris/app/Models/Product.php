<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['name', 'image', 'description', 'price', 'stock', 'category_id' ];

    public function categories(){

     return $this->belongsTo(categories::class, 'category_id');
    }
}
