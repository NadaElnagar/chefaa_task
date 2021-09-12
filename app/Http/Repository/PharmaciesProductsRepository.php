<?php

namespace App\Http\Repository;

use App\Models\Pharmacies;
use App\Models\PharmaciesProducts;
use App\Models\Products;

class PharmaciesProductsRepository
{
    public function index()
    {
        return PharmaciesProducts::paginate(10);
    }


    public function getData()
    {
       $data['products'] = Products::get();
       $data['pharmacies'] = Pharmacies::get();
       return $data;
    }

    public function updateOrCreate($request)
    {
            PharmaciesProducts::updateOrCreate(['products_id'=>$request['products_id'],
                'pharmacies_id'=>$request['pharmacies_id']
            ],['quantity'=>$request['quantity'],'price'=>$request['price']]);
            return true;
    }

    public function show($id)
    {
        return PharmaciesProducts::find($id);
    }

    public function destroy($id)
    {
        $pharmacies = PharmaciesProducts::findOrFail($id);
        if($pharmacies){
            $pharmacies->delete();
            return  true;
        }
        return false;
    }
}
