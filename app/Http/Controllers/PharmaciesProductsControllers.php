<?php

namespace App\Http\Controllers;


use App\Http\Requests\PharmaciesProductsRequest;
use App\Http\Services\PharmaciesProductsServices;
use Illuminate\Support\Facades\Redirect;

class PharmaciesProductsControllers  extends Controller
{

    public function __construct()
    {
        $this->pharmacies = new PharmaciesProductsServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = $this->pharmacies->index();
        return view('pharmacies_products.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->pharmacies->getData();
        return view('pharmacies_products.create',compact('data'));
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
        if ($pharmacies) {
            return Redirect::to('pharmacies_products');
        } else {
            return Redirect::back()->withErrors($pharmacies);
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
        return view('pharmacies_products/show', compact('pharmacies'));
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
        $pharmacies = $this->pharmacies->show($id);
        return view('pharmacies_products/edit', compact('pharmacies','data'));
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
        if ($pharmacies) {
            return Redirect::to('pharmacies_products');
        } else {
            return Redirect::back()->withErrors($pharmacies);
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
        return $this->pharmacies->destroy($id);
    }
}
