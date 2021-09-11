<?php

namespace App\Http\Controllers;
use App\Http\Requests\pharmaciesRequest;
use App\Http\Services\PharmaciesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PharmaciesControllers  extends Controller
{

    public function __construct()
    {
        $this->pharmacies = new PharmaciesServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = $this->pharmacies->index();
        return view('pharmacies.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.create');
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
        if ($pharmacies) {
            return Redirect::to('pharmacies');
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
        return view('pharmacies/show', compact('pharmacies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacies = $this->pharmacies->show($id);
        return view('pharmacies/edit', compact('pharmacies'));
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
        if ($pharmacies) {
            return Redirect::to('pharmacies');
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
