<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\pharmaciesRequest;
use App\Http\Resources\PharmacyResource;
use App\Http\Services\PharmaciesServices;
use App\Http\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class PharmaciesControllers  extends Controller
{

    public function __construct()
    {
        $this->pharmacies = new PharmaciesServices();
        $this->reponse    = new ResponseService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies =PharmacyResource::collection( $this->pharmacies->index());
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
    public function store(pharmaciesRequest $request)
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
        $pharmacies = new PharmacyResource($this->pharmacies->show($id));
        if($pharmacies){
            return $this->reponse->responseWithSuccess($pharmacies);
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
    public function update(pharmaciesRequest $request, $id)
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
