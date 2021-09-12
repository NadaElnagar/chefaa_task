<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Http\Resources\ProductsResource;
use App\Http\Services\ProductsServices;
use App\Http\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class ProductsControllers extends Controller
{

    public function __construct()
    {
        $this->products = new ProductsServices();
        $this->reponse    = new ResponseService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductsResource::collection($this->products->index());
        if($products){
            return $this->reponse->responseWithSuccess($products);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {
        $products = $this->products->store($request);
        if($products){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = new ProductsResource($this->products->show($id));
        if($products){
            return $this->reponse->responseWithSuccess($products);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, $id)
    {
        $products = $this->products->update($request,$id);
         if($products){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST,$products);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products =  $this->products->destroy($id);
        if($products){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }
}
