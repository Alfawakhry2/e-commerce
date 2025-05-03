<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'requireDate' , 'user_id' ,
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetails::class);
     }
}


