<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class EspecialistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mostrarPantallaPrincipal()
    {
        return view('especialista.vistaprincipalespecialista');
    }
}
