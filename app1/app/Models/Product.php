<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['title', 'description', 'price','image','category_id'];

    //belongsTo relationship
    // Product belongsTo Category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
