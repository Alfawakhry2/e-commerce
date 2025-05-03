<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'desc' , 'image' , 'price' , 'quantity' , 'category_id'
    ];


    // relationships
    public function category(){
        return $this->belongsTo(Category::class);
     }

     public function orderdetails(){
        return $this->hasMany(OrderDetails::class);
     }
}
