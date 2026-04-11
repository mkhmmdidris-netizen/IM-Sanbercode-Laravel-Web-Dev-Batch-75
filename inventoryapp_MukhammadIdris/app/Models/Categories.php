<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
        protected $table = "Categories";

        protected $fillable = ['name', 'categories']; 
        
        public function products(){

                return $this->hasMany(Product::class, 'category_id');

        }

}
