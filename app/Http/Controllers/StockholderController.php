<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockholderRequest;
use App\Http\Requests\UpdateStockholderRequest;
use App\Models\Stockholder;

class StockholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stockholders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockholderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockholderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stockholder  $stockholder
     * @return \Illuminate\Http\Response
     */
    public function show(Stockholder $stockholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockholder  $stockholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockholder $stockholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockholderRequest  $request
     * @param  \App\Models\Stockholder  $stockholder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockholderRequest $request, Stockholder $stockholder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockholder  $stockholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockholder $stockholder)
    {
        //
    }
}
