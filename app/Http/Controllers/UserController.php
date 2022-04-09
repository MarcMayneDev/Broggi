<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

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
        $data['users'] = $users;

        $perfils = Perfil::All()->sortBy("id");
        $data['perfils'] = $perfils;

        return view('admin', $data);
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

    public function store(Request $request)
    {
        $user = new User();
        $user->usuari = $request->input('usuario');
        $user->contrassenya = Hash::make($request->input('contrasenya'));
        $user->nom = $request->input('nombre');
        $user->cognoms = $request->input('apellidos');
        $user->perfils_id = $request->input('usertype');

        try {
            $user->save();
        } catch(QueryException $ex) {
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
            Auth::login($user);
            return view('index');
        } else {
            return redirect('login')->withInput();
        }
    }


    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        $perfils = Perfil::All();
        $data['perfils'] = $perfils;

        return view('adminEdit', $data);
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
        $user->usuari = $request->input('usuari');
        $user->contrassenya = Hash::make($request->input('contrassenya'));
        $user->nom = $request->input('nom');
        $user->cognoms = $request->input('cognoms');
        $user->perfils_id = $request->input('perfils_id');

        try {
            $user->save();
        } catch(QueryException $ex) {
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }

        return redirect()->action([UserController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();
        } catch(QueryException $ex) {
            // ToDo -> Crear controlador de mensajes
            // $message = ControladorMensajes::errorMessage($ex);
            // $request->session()->flash('error', $message);
        }

        return redirect()->action([UserController::class, 'index']);
    }
}
