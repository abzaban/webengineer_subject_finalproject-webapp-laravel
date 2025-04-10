<?php

namespace App\Http\ServiciosExternos;


class SistemaBancario
{
    public static function validarPago($datosTarjetaCredito, $totalPedido) {
        return ($datosTarjetaCredito['mes'] == 12 || $datosTarjetaCredito['anio'] > 2021);
    }
}
