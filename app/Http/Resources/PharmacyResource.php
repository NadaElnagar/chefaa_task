<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array(
          'id'=>$this->pharmacies->id,
          'name'=>$this->pharmacies->name,
          'address'=>$this->pharmacies->address,
          'price'=>(isset($this->price ))?$this->price:0
        );
    }
}
