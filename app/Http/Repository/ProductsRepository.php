<?php

namespace App\Http\Repository;

use App\Models\Products;

class ProductsRepository
{
    public function index()
    {
       return Products::paginate(10);
    }

    public function store($request)
    {
        try{
            $products =  Products::create($request->all());
            if ($request->input('image', false)) {
                $products->addMedia(storage_path('app\public\\' . basename($request->input('image'))))->toMediaCollection('products');
            }
            return true;
        }catch (\Exception $ex){
            return  true;
        }
    }

    public function show($id)
    {
        return Products::find($id);
    }


    public function update($request,$id)
    {
       $product =  Products::where('id',$id)->update($request);

        if (isset($request['image'])) {
            if (!$product->image || $request['image'] !== $product->image->file_name) {
                if ($product->image) {
                    $product->image->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . basename($request['image'])))->toMediaCollection('image');
            }
        } elseif ($product->image) {
            $product->image->delete();
        }

        return true;
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        if($product){
            $product->delete();
            return  true;
        }
        return false;
    }

    public function search($title)
    {
      return  Products::where('title', 'like', '%' . $title . '%')->get();
    }
}
