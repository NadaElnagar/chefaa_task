<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'price' => (isset($this->pivot->price)) ? $this->pivot->price : 0,
            'qunatity' => (isset($this->pivot->qunatity)) ? $this->pivot->qunatity : 0,

        );
    }
}
