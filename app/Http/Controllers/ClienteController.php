<?php

namespace App\Http\Controllers;

use App\Models\VariedadDatil;

class ClienteController extends Controller
{
    public function iniciarCompra() {
        $variedades = VariedadDatil::obtenerVariedades();
        return view("cliente.vistaprincipalcliente", compact('variedades'));
    }

    public function verDetalleProducto($id) {
        $variedad = VariedadDatil::find($id);
        return view("cliente.ventas.vistadetalleproducto", compact('variedad'));
    }
}
