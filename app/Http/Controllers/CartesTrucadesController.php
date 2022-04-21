<?php

namespace App\Http\Controllers;

use App\Models\Provincies;
use App\Models\Comarques;
use App\Models\Municipis;
use App\Models\Tipus_localitzacions;
use App\Models\Incidents;
use App\Models\Dades_personals;
use App\Models\Expedients;

use App\Models\Cartes_trucades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CartesTrucadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Limpiar */
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

        return view('cartaTrucada.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('cartaTrucada.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Dades Personals
        $dades_personals = new Dades_personals();
        $dades_personals->telefon = $request->input('telefon');

        //Expedients
        $expedients = new Expedients();
        $expedients->data_creacio = $request->input('data_hora');
        $expedients->data_ultima_modificacio = $request->input('data_hora');
        $expedients->estats_expedients_id = 1;
        $expedients->save();

        //Carta Trucada
        $cartes_trucades = new Cartes_trucades();
        $cartes_trucades->temps_trucada = $request->input('time');
        $cartes_trucades->data_hora = $request->input('data_hora');
        $cartes_trucades->telefon = $request->input('telefon');
        $cartes_trucades->procedencia_trucada = $request->input('procedencia_trucada');
        $cartes_trucades->origen_trucada = $request->input('origen_trucada');
        $cartes_trucades->nom_trucada = $request->input('nom_trucada');
        $cartes_trucades->usuaris_id = $request->input('userid');
        $cartes_trucades->nota_comuna = $request->input('nota_comuna');

        if($request->input('fora_catalunya')){
            $cartes_trucades->fora_catalunya = $request->input('fora_catalunya');
        } else{
            $cartes_trucades->fora_catalunya = "0";
        }
        $cartes_trucades->provincies_id = $request->input('provincies_id');
        $cartes_trucades->municipis_id = $request->input('municipis_id');

        $cartes_trucades->tipus_localitzacions_id = $request->input('tipus_localitzacions');
        $cartes_trucades->descripcio_localitzacio = $request->input('descripcio_localitzacio');
        $cartes_trucades->detall_localitzacio = $request->input('detall_localitzacio');
        $cartes_trucades->altres_ref_localitzacio = $request->input('altres_ref_localitzacio');

        $cartes_trucades->expedients_id = $expedients->id;
        $cartes_trucades->incidents_id = $request->input('incidents_id');

        // HARDCODED VALUES - Resolver dudas con Francisco
        // Cuando hay que pedir los datos personales?
        // Como se genera codi trucada?
        // Que es municipis id trucada?
        // Si la provincia es de fora de Catalunya, com indico la provincia y el municipi? Si només tenim provincies de catalunya
        $cartes_trucades->codi_trucada = "test_codi";
        $cartes_trucades->dades_personals_id = 1;
        $cartes_trucades->municipis_id_trucada = 1;

        try
        {
            $cartes_trucades->save();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
            return $ex;
        }
        return $expedients->id;
        return view('index');
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
