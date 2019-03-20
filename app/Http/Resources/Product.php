<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'product',
            'uuid' => (string) $this->uuid,
            'attributes' =>[
                'price' => $this->price,
                'name' => (string) $this->name,
                'ean' =>  $this->ean,
                'quantity_discount' => (int) $this->quantity_discount,
                'out_of_stock' => (boolean) $this->out_of_stock,
                'on_sale' =>  (boolean) $this->on_sale,
                'active' =>  (boolean)  $this->active,
            ],
            'links'         => [
                'self' => route('product.show', ['uuid' => $this->uuid]),
            ]
        ];
    }
}
