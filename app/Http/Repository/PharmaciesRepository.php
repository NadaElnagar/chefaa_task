<?php

namespace App\Http\Repository;

use App\Models\Pharmacies;

class PharmaciesRepository
{
    public function index()
    {
        return Pharmacies::paginate(10);
    }

    public function store($request)
    {
        try{
            $pharmacies =  Pharmacies::create($request->all());
            return true;
        }catch (\Exception $ex){
            return  true;
        }
    }

    public function show($id)
    {
        return Pharmacies::find($id);
    }


    public function update($request,$id)
    {
         Pharmacies::where('id',$id)->update($request);
        return true;
    }

    public function destroy($id)
    {
        $pharmacies = Pharmacies::findOrFail($id);
        if($pharmacies){
            $pharmacies->delete();
            return  true;
        }
        return false;
    }
}
