<?php

namespace App\Http\Controllers;

use App\Models\Provincies;
use App\Models\Comarques;
use App\Models\Municipis;
use App\Models\Tipus_localitzacions;
use App\Models\Incidents;


use App\Models\Cartes_trucades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartesTrucadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincies = Provincies::all();
        $data['provincies'] = $provincies;

        $comarques = Comarques::all();
        $data['comarques'] = $comarques;

        $municipis = Municipis::all();
        $data['municipis'] = $municipis;

        $tipus_localitzacions = Tipus_localitzacions::all();
        $data['tipus_localitzacions'] = $tipus_localitzacions;

        $incidents = Incidents::all();
        $data['incidents'] = $incidents;

        return view('cartaTrucada', $data);
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
     * @param  \App\Models\Cartes_trucades  $cartes_trucades
     * @return \Illuminate\Http\Response
     */
    public function show(Cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cartes_trucades  $cartes_trucades
     * @return \Illuminate\Http\Response
     */
    public function edit(Cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cartes_trucades  $cartes_trucades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartes_trucades $cartes_trucades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cartes_trucades  $cartes_trucades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cartes_trucades $cartes_trucades)
    {
        //
    }
}
