<?php

namespace App\Http\Controllers\Admin;

// Default imports
use App\Http\Controllers\Controller;

// Own imports
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin() {
        return view('auth.login');
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
}
