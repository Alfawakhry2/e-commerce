<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' ,'small_desc' ,'desc' , 'image'
    ];

    public function product(){
       return $this->hasMany(Product::class);
    }
}
