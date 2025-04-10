<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InicioSesionController extends Controller
{
    public function mostrarPantallaInicioSesion()
    {
        return view('auth.login');
    }

    public function autenticarUsuario(loginRequest $request)
    {
        $credenciales['email'] = $request->email;
        $credenciales['password'] = $request->password;
        if (Auth::attempt($credenciales)) {
            $usuario = User::where('email', $credenciales['email'])->first();
            switch ($usuario->rol_id) {
                case 1:
                    return redirect('/empleados/especialista/inicio');

                case 2:
                    return redirect('/');
                    break;
            }
        }
        return redirect('/');
    }

    public function cerrarSesion() {
        Auth::logout();
        return redirect('/');
    }
}
