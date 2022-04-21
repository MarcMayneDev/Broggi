<?php

namespace App\Http\Controllers;

use App\Models\Expedients;
use App\Http\Controllers\Controller;
use App\Models\Estats_expedients;
use Illuminate\Http\Request;

class ExpedientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedients = Expedients::all();
        $data['expedients'] = $expedients;

        $estats_expedients = Estats_expedients::All();
        $data['estats_expedients'] = $estats_expedients;

        return view('expedientes', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function show(Expedients $expedients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function edit(Expedients $expedients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expedients $expedients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedients  $expedients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expedients $expedients)
    {
        //
    }
}
