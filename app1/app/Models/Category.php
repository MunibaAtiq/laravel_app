<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['title', 'description', 'image'];

    //HasMany Relationship
    // Category hasMany Products
    public function products(){
        return $this->hasMany(Products::class);
    }
}
