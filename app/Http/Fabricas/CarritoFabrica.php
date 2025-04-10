<?php

namespace App\Http\Fabricas;

use App\Http\Persistencias\VentaPersistencia;
use App\Models\ArticuloCarrito;

class CarritoFabrica
{
    private $ventaPersistencia;

    public function __construct()
    {
        $this->ventaPersistencia = new VentaPersistencia();
    }

    public function añadirArticulo($varied_id, $usu_id, $car_cantidad) {
        $arregloDatos["usu_id"] = $usu_id;
        $arregloDatos["varied_id"] = $varied_id;
        $arregloDatos["car_cantidad"] = $car_cantidad;
        $articulo = new ArticuloCarrito($arregloDatos);
        $this->ventaPersistencia->guardarArticuloCarrito($articulo);
    }

    public function getCarrito($usu_id) {
        return $this->ventaPersistencia->recuperarCarrito($usu_id);
    }

    public function calcularTotal($usu_id) {
        $carrito = $this->getCarrito($usu_id);
        $totalAcumulado = 0;
        foreach($carrito as $articulo) {
            $totalAcumulado += $articulo->getSubTotal();
        }
        return $totalAcumulado;
    }

    public function quitarArticuloCarrito($varied_id, $usu_id) {
        $this->ventaPersistencia->quitarArticuloCarrito($varied_id, $usu_id);
    }
}