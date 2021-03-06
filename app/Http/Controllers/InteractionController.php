<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Http\Requests\StoreInteractionRequest;
use App\Http\Requests\UpdateInteractionRequest;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInteractionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInteractionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function show(Interaction $interaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Interaction $interaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInteractionRequest  $request
     * @param  \App\Models\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInteractionRequest $request, Interaction $interaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interaction $interaction)
    {
        //
    }
}
