<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // data that will appear in json (api)
        //you control the name of column that will appear to front-end
        return[
            'product_id'=>$this->id,
            'product_name'=>$this->name,
            'product_description'=>$this->desc,
            'product_price'=>$this->price,
            'product_quantity'=>$this->quantity,
            'product_image'=>asset("storage")."/".$this->image,

        ];
    }
}
