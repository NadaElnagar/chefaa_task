<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmaciesProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             "products_id"=>"required|integer",
             "pharmacies_id"=>"required|integer",
             "quantity"=>"integer|min:1",
             "price"=>"required|min:1",
        ];
    }
}
