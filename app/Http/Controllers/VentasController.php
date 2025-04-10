<?php

namespace App\Http\Controllers;

use App\Http\Fabricas\CarritoFabrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\datosPagoRequest;
use App\Http\ServiciosExternos\SistemaBancario;
use App\Models\Venta;

class VentasController extends Controller
{
    private $carritoFabrica;

    public function __construct()
    {
        $this->carritoFabrica = new CarritoFabrica();
    }

    public function realizarPedido(Request $request) {
        $usu_id = Auth::user()->id;
        $this->carritoFabrica->añadirArticulo($request->varied_id, $usu_id, $request->car_cantidad);
        return redirect('/');
    }

    public function verCarrito() {
        $usuario = Auth::user()->id;
        $carrito = $this->carritoFabrica->getCarrito($usuario);
        $totalPedido = $this->carritoFabrica->calcularTotal($usuario);
        return view('cliente.ventas.vistadetallecarrito', compact('carrito', 'totalPedido'));
    }

    public function quitarArticuloCarrito($varied_id) {
        $usuario = Auth::user()->id;
        $this->carritoFabrica->quitarArticuloCarrito($varied_id, $usuario);
        return redirect('/ventas/verCarrito');
    }

    public function capturaDatosPago() {
        return view('cliente.ventas.vistapagarcarrito');
    }

    public function pagarCarrito(datosPagoRequest $request) {
        $usuario = Auth::user()->id;
        $totalPedido = $this->carritoFabrica->calcularTotal($usuario);
        $resultadoPago = SistemaBancario::validarPago($request->all(), $totalPedido);
        if (!$resultadoPago) {
            redirect()->back()->with('pagoValido', 'no');
            return;
        }
        $carrito = $this->carritoFabrica->getCarrito($usuario);
        $venta = new Venta();
        $venta->hacerLineasDeVenta($carrito);
        return redirect('/')->with('ventaRealizada', 'si');
    }
}
