<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmaciesProductsRequest;
use App\Http\Services\PharmaciesProductsServices;
use App\Http\Services\ResponseService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class PharmaciesProductsControllers  extends Controller
{

    public function __construct()
    {
        $this->pharmacies = new PharmaciesProductsServices();
        $this->reponse    = new ResponseService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = $this->pharmacies->index();
        if($pharmacies){
            return $this->reponse->responseWithSuccess($pharmacies);
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
    public function store(PharmaciesProductsRequest $request)
    {
        $pharmacies = $this->pharmacies->store($request);
        if($pharmacies){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST,$pharmacies);
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
        $pharmacies = $this->pharmacies->show($id);
        if($pharmacies){
            return $this->reponse->responseWithSuccess($pharmacies);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->pharmacies->getData();
        $data['pharmacies'] = $this->pharmacies->show($id);
        if($data){
            return $this->reponse->responseWithSuccess($data);
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
    public function update(PharmaciesProductsRequest $request, $id)
    {
        $pharmacies = $this->pharmacies->update($request,$id);
        if($pharmacies){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST,$pharmacies);
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
         $pharmacies = $this->pharmacies->destroy($id);
        if($pharmacies){
            return $this->reponse->responseWithSuccess(true);
        }else{
            return $this->responseWithFailure(Response::HTTP_BAD_REQUEST, __('messages.Error, Please Try again Letter'));
        }
    }
}
