<?php

namespace App\Http\Repository;

use App\Models\PharmaciesProducts;

class PharmaciesProductsRepository
{
    public function index()
    {
        return PharmaciesProducts::paginate(10);
    }

    public function updateOrCreate($request)
    {
        try{
           PharmaciesProducts::updateOrCreate(['products_id'=>$request['products_id'],
                'pharmacies_id'=>$request['pharmacies_id']
                ],['quantity'=>$request['quantity'],['price'=>$request['price']]]);
            return true;
        }catch (\Exception $ex){
            return  false;
        }
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
