<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

$users = User::all();
class UserController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->usuari = $request->input('username');
        $user->contrassenya = $request->input('password');
        $user->nom = $request->input('nombre');
        $user->cognoms = $request->input('apellidos');
        $user->perfils_id = $request->input('usertype');

        try
        {
            $user->save();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->codi = $request->input('codi');
        $user->contrassenya = $request->input('contrassenya');
        $user->nom = $request->input('nom');
        $user->cognoms = $request->input('cognoms');

        try
        {
            $user->save();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try
        {
            $user->delete();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }
    }
}
