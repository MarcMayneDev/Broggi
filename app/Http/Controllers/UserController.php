<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

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
        $users = User::all();

        return view('admin', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminCreate');
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
        $user->usuari = $request->input('usuario');
        $user->contrassenya = $request->input('contrasenya');
        $user->nom = $request->input('nombre');
        $user->cognoms = $request->input('apellidos');
        $user->perfils_id = 1; //$request->input('usertype');

        try
        {
            $user->save();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }
        return view('login');
    }

    public function adminStore(Request $request)
    {

        $user = new User();
        $user->usuari = $request->input('usuario');
        $user->contrassenya = $request->input('contrasenya');
        $user->nom = $request->input('nombre');
        $user->cognoms = $request->input('apellidos');
        $user->perfils_id = $request->input('usertype'); //$request->input('usertype');

        try
        {
            $user->save();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }
        return redirect()->action([UserController::class, 'index']);
    }

    public function login(Request $request) {
        $usuario = $request->input('usuario');
        $password = $request->input('contrasenya');

        $user = User::where('usuari', $usuario)
                            ->first();

        if ($user != null && Hash::check($password, $user->contrassenya)) {
            Auth::login($usuario);
            return view('index');
        } else {
            return redirect('login')->withInput();
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
        return view('adminEdit');
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
        $user->usuari = $request->input('usuario');
        $user->contrassenya = $request->input('contrasenya');
        $user->nom = $request->input('nombre');
        $user->cognoms = $request->input('apellidos');

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
    public function destroy(Request $request, User $user)
    {
        try
        {
            $user->delete();
        } catch(QueryException $ex){
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }
        return redirect()->action([UserController::class, 'index']);
    }
}
